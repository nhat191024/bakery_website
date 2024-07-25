<?php

namespace App\Service\admin;

use App\Models\About_us;
use App\Models\Banners;
use App\Models\Promotions;

class PromotionService
{
    public function get()
    {
        return Promotions::first();
    }

    public function edit($request)
    {
        $promotion = PromotionService::get();
        $promotion->product_id = $request->product_id;
        $promotion->fake_price = $request->fake_price;
        $promotion->start_time = $request->start_time;
        $promotion->end_time = $request->end_time;
        return $promotion->save();
    }
}
