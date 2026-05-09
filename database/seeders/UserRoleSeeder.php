<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users and roles
        $users = DB::table('users')->pluck('id', 'email');
        $roles = DB::table('roles')->pluck('id', 'slug');

        // Define user-role mappings
        $rolesForUsers = [
            'admin@eggstore.com' => ['admin'],
            'customer@example.com' => ['customer'],
            'order@eggstore.com' => ['order_manager', 'payment_manager'],
            'delivery@eggstore.com' => ['delivery_staff'],
            'support@eggstore.com' => ['support'],
        ];

        // Assign roles to users
        foreach ($rolesForUsers as $userEmail => $roleSlugs) {
            foreach ($roleSlugs as $roleSlug) {

                // Skip if role doesn't exist
                if (!isset($roles[$roleSlug])) continue;

                DB::table('role_users')->insertOrIgnore([
                    'user_id' => $users[$userEmail],
                    'role_id' => $roles[$roleSlug],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
