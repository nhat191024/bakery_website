<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventLog;
use App\Models\ProductView;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;

class LogController extends Controller
{
    // Xem log sự kiện (add_to_cart, apply_voucher, ...)
    public function events(Request $request)
    {
        $query = EventLog::orderBy('created_at', 'desc');

        if ($request->filled('type')) {
            $query->where('type', $request->type); // add_to_cart, apply_voucher
        }

        if ($request->filled('from')) {
            $query->where('created_at', '>=', $request->from.' 00:00:00');
        }

        if ($request->filled('to')) {
            $query->where('created_at', '<=', $request->to.' 23:59:59');
        }

        $events = $query->paginate(20);

        return view('admin.logs.events', compact('events'));
    }

    // Thống kê voucher: số lần dùng, tỉ lệ success/failed theo code
    public function voucherStats(Request $request)
    {
        $from = $request->from ? now()->parse($request->from) : now()->subDays(30);
        $to   = $request->to   ? now()->parse($request->to)->endOfDay() : now();

        // Lấy tất cả log apply_voucher trong khoảng thời gian
        $logs = EventLog::where('type', 'apply_voucher')
            ->whereBetween('created_at', [$from, $to])
            ->get();

        $stats = [];

        foreach ($logs as $log) {
            $code = $log->data['code'] ?? 'UNKNOWN';
            $status = $log->data['status'] ?? 'unknown';

            if (!isset($stats[$code])) {
                $stats[$code] = [
                    'code'    => $code,
                    'total'   => 0,
                    'success' => 0,
                    'failed'  => 0,
                ];
            }

            $stats[$code]['total']++;

            if ($status === 'success') {
                $stats[$code]['success']++;
            } elseif ($status === 'failed') {
                $stats[$code]['failed']++;
            }
        }

        // Đưa về collection cho dễ sort trên view
        $stats = collect($stats)->sortByDesc('total');

        return view('admin.stats.vouchers', [
            'stats' => $stats,
            'from'  => $from,
            'to'    => $to,
        ]);
    }

    // Thống kê mặt hàng: xem nhiều (product_views) + add_to_cart
    public function productStats(Request $request)
    {
        $from = $request->from ? now()->parse($request->from) : now()->subDays(30);
        $to   = $request->to   ? now()->parse($request->to)->endOfDay() : now();

        // Đếm view theo product_id
        $views = ProductView::whereBetween('viewed_at', [$from, $to])->get();

        $viewCounts = [];
        foreach ($views as $v) {
            $pid = (int) $v->product_id;
            $viewCounts[$pid] = ($viewCounts[$pid] ?? 0) + 1;
        }

        // Đếm add_to_cart theo product_id từ EventLog
        $addLogs = EventLog::where('type', 'add_to_cart')
            ->whereBetween('created_at', [$from, $to])
            ->get();

        $cartCounts = [];
        foreach ($addLogs as $log) {
            $pid = (int) ($log->data['product_id'] ?? 0);
            if ($pid <= 0) continue;

            $qty = (int) ($log->data['quantity'] ?? 1);
            $cartCounts[$pid] = ($cartCounts[$pid] ?? 0) + $qty;
        }

        // Gom lại theo product_id
        $allProductIds = collect(array_keys($viewCounts))
            ->merge(array_keys($cartCounts))
            ->unique()
            ->filter(fn($id) => $id > 0)
            ->values()
            ->toArray();

        $products = Products::whereIn('id', $allProductIds)->get()->keyBy('id');

        $stats = [];

        foreach ($allProductIds as $pid) {
            $stats[] = [
                'product_id'   => $pid,
                'name'         => $products[$pid]->name ?? ('#'.$pid),
                'views'        => $viewCounts[$pid] ?? 0,
                'add_to_cart'  => $cartCounts[$pid] ?? 0,
            ];
        }

        // Sắp xếp: ưu tiên add_to_cart, sau đó views
        $stats = collect($stats)->sortByDesc(function ($item) {
            return [$item['add_to_cart'], $item['views']];
        });

        return view('admin.stats.products', [
            'stats' => $stats,
            'from'  => $from,
            'to'    => $to,
        ]);
    }
}
