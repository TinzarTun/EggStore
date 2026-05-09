<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all roles and permissions
        $roles = DB::table('roles')->pluck('id', 'slug');
        $permissions = DB::table('permissions')->pluck('id', 'slug');

        // Define role-permission mappings
        $permissionsForRoles = [
            'admin' => ['manage_users', 'manage_products', 'manage_categories', 'manage_orders', 'manage_payments', 'manage_deliveries', 'manage_reviews', 'reply_reviews'],
            'customer' => ['manage_orders', 'manage_payments', 'manage_reviews'],
            'order_manager' => ['manage_orders'],
            'payment_manager' => ['manage_payments'],
            'delivery_staff' => ['manage_deliveries'],
            'support' => ['reply_reviews'],
        ];

        // Assign permissions to roles
        foreach ($permissionsForRoles as $roleSlug => $permissionSlugs) {
            foreach ($permissionSlugs as $permSlug) {

                // Skip if permission doesn't exist
                if (!isset($permissions[$permSlug])) continue;

                DB::table('permission_roles')->insertOrIgnore([
                    'role_id' => $roles[$roleSlug],
                    'permission_id' => $permissions[$permSlug],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
