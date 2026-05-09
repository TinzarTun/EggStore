<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'slug' => 'admin', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Customer', 'slug' => 'customer', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Order Manager', 'slug' => 'order_manager', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Payment Manager', 'slug' => 'payment_manager', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Delivery Staff', 'slug' => 'delivery_staff', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
            ['name' => 'Support', 'slug' => 'support', "created_at" => Carbon::now(), "updated_at" => Carbon::now(),],
        ]);
    }
}
