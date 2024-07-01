<?php

namespace Database\Seeders;

use App\Models\About_us;
use App\Models\Banners;
use App\Models\Bill_details;
use App\Models\Bills;
use App\Models\Blogs;
use App\Models\Contact_infos;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Contact_us;
use App\Models\Message;
use App\Models\Promotions;
use App\Models\User;
use App\Models\Vouchers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonFilePath = "./database/seeders/data.json";
        $jsonContent = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonContent, true);

        foreach ($dataArray['users'] as $row) {
            User::create([
                "username" => $row['username'],
                "password" => $row['password'],
                "email" => $row['email'],
                "address" => $row['address'],
                "phone_number" => $row['phone_number'],
                "role" => $row['role'],
                "status" => $row['status'],
            ]);
        }

        foreach ($dataArray['categories'] as $row) {
            Categories::create([
                "name" => $row['name'],
            ]);
        }

        foreach ($dataArray['products'] as $row) {
            Products::create([
                "category_id" => $row['category_id'],
                "name" => $row['name'],
                "description" => $row['description'],
                "real_price" => $row['real_price'],
                "fake_price" => $row['fake_price'],
                "image" => $row['image'],
            ]);
        }

        foreach ($dataArray['promotions'] as $row) {
            Promotions::create([
                "user_id" => $row['user_id'],
                "product_id" => $row['product_id'],
                "description" => $row['description'],
                "start_time" => $row['start_time'],
                "end_time" => $row['end_time'],
            ]);
        }

        foreach ($dataArray['blogs'] as $row) {
            Blogs::create([
                "user_id" => $row['user_id'],
                "title" => $row['title'],
                "subtitle" => $row['subtitle'],
                "content" => $row['content'],
                "thumbnail" => $row['thumbnail'],
            ]);
        }

        foreach ($dataArray['banners'] as $row) {
            Banners::create([
                "title" => $row['title'],
                "subtitle" => $row['subtitle'],
                "image" => $row['image'],
                "link" => $row['link'],
                "start_date" => $row['start_date'],
                "end_date" => $row['end_date'],
                "status" => $row['status'],
            ]);
        }

        foreach ($dataArray['contact_us'] as $row) {
            Contact_us::create([
                "website" => $row['website'],
                "phone_number" => $row['phone_number'],
                "email" => $row['email'],
                "address" => $row['address'],
            ]);
        }

        foreach ($dataArray['about_us'] as $row) {
            About_us::create([
                "title" => $row['title'],
                "description" => $row['description'],
                "image" => $row['image'],
            ]);
        }

        foreach ($dataArray['message'] as $row) {
            Message::create([
                "name" => $row['name'],
                "email" => $row['email'],
                "subject" => $row['subject'],
                "message" => $row['message'],
            ]);
        }

        foreach ($dataArray['vouchers'] as $row) {
            Vouchers::create([
                "code" => $row['code'],
                "description" => $row['description'],
                "discount_amount" => $row['discount_amount'],
                "min_price" => $row['min_price'],
                "quantity" => $row['quantity'],
                "start_date" => $row['start_date'],
                "end_date" => $row['end_date'],
                "status" => $row['status'],
            ]);
        }

        foreach ($dataArray['bills'] as $row) {
            Bills::create([
                "order_date" => $row['order_date'],
                "full_name" => $row['full_name'],
                "address" => $row['address'],
                "phone_number" => $row['phone_number'],
                "email" => $row['email'],
                "delivery_method" => $row['delivery_method'],
                "payment_method" => $row['payment_method'],
                "total_amount" => $row['total_amount'],
                "status" => $row['status'],
            ]);
        }

        foreach ($dataArray['bill_details'] as $row) {
            Bill_details::create([
                "Product_id" => $row['Product_id'],
                "bill_id" => $row['bill_id'],
                "quantity" => $row['quantity'],
                "price" => $row['price'],
            ]);
        }

        foreach ($dataArray['contact_infos'] as $row) {
            Contact_infos::create([
                "type" => $row['type'],
                "name" => $row['name'],
            ]);
        }
    }
}
