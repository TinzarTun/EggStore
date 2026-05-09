<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'Manage Users', 'slug' => 'manage_users', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Manage Products', 'slug' => 'manage_products', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Manage Categories', 'slug' => 'manage_categories', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Manage Orders', 'slug' => 'manage_orders', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Manage Payments', 'slug' => 'manage_payments', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Manage Deliveries', 'slug' => 'manage_deliveries', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Manage Reviews', 'slug' => 'manage_reviews', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Reply Reviews', 'slug' => 'reply_reviews', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
        ]);
    }
}
