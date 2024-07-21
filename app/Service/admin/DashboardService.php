<?php

namespace App\Service\admin;

use App\Models\Bills;
use Carbon\Carbon;

class DashboardService
{

    public function getAll()
    {
        $bill = Bills::orderByDesc('order_date')->get();
        return $bill;
    }
    public function getDashboard()
    {
        $day = $this->getRevenueByDay();
        $week = $this->getRevenueByWeek();
        $month = $this->getRevenueByMonth();
        $years = $this->getRevenueByYear();
        return [
            'billDay' => $day,
            'billWeek' => $week,
            'billMonth' => $month,
            'billYears' => $years
        ];
    }

    public function getRevenueByDay() {
        $totalRevenue = Bills::whereDate('order_date', now()->toDateString())
                            ->where('status', 1)->sum('total_amount');
        return number_format($totalRevenue);
    }

    public function getRevenueByWeek() {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $totalRevenue = Bills::whereBetween('order_date', [$startOfWeek, $endOfWeek])
                            ->where('status', 1)->sum('total_amount');

        return number_format($totalRevenue);
    }

    public function getRevenueByMonth() {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $totalRevenue = Bills::whereBetween('order_date', [$startOfMonth, $endOfMonth])
                            ->where('status', 1)->sum('total_amount');

        return number_format($totalRevenue);
    }

    public function getRevenueByYear() {
        $startOfYear = now()->startOfYear();
        $endOfYear = now()->endOfYear();

        $totalRevenue = Bills::whereBetween('order_date', [$startOfYear, $endOfYear])
                            ->where('status', 1)->sum('total_amount');

        return number_format($totalRevenue);
    }
}
