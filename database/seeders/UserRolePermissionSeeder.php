<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $author = User::create(array_merge([
                'email' => 'author@gmail.com',
                'name' => 'author',
            ], $default_user_value));

            $editor = User::create(array_merge([
                'email' => 'editor@gmail.com',
                'name' => 'editor',
            ], $default_user_value));

            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
            ], $default_user_value));

            $superadmin = User::create(array_merge([
                'email' => 'superadmin@gmail.com',
                'name' => 'superadmin',
            ], $default_user_value));

            $role_author = Role::create(['name' => 'author']);
            $role_editor = Role::create(['name' => 'editor']);
            $role_admin = Role::create(['name' => 'admin']);
            $role_superadmin = Role::create(['name' => 'superadmin']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
            Permission::create((['name' => 'read konfigurasi']));

            $role_superadmin->givePermissionTo('read role');
            $role_superadmin->givePermissionTo('create role');
            $role_superadmin->givePermissionTo('update role');
            $role_superadmin->givePermissionTo(['delete role', 'read konfigurasi']);

            $author->assignRole('author');
            $author->assignRole('editor');
            $editor->assignRole('editor');
            $admin->assignRole('admin');
            $superadmin->assignRole('superadmin');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
