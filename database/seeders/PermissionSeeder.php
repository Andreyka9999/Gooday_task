<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Roles (idempotent)
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $user = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);

        // Permissions (idempotent)
        $blogPerm = Permission::firstOrCreate(['name' => 'blog.manage', 'guard_name' => 'web']);
        $newsPerm = Permission::firstOrCreate(['name' => 'news.manage', 'guard_name' => 'web']);

        // Assigning rights to roles
        $admin->givePermissionTo([$blogPerm, $newsPerm]);
        $user->givePermissionTo([$blogPerm]);
    }
}
