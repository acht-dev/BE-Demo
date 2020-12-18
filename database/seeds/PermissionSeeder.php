<?php

use App\Entities\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // DB::table('permissions')->truncate();
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'companies-list',
            'companies-create',
            'companies-view',
            'companies-edit',
            'companies-delete',
            'majors-list',
            'majors-create',
            'majors-view',
            'majors-edit',
            'majors-delete',
            'educations-list',
            'educations-create',
            'educations-view',
            'educations-edit',
            'educations-delete',
            'locations-list',
            'locations-create',
            'locations-view',
            'locations-edit',
            'locations-delete',
            'categorizes-list',
            'categorizes-create',
            'categorizes-view',
            'categorizes-edit',
            'categorizes-delete',
            'contracts-list',
            'contracts-create',
            'contracts-view',
            'contracts-edit',
            'contracts-delete',
            'Languages-list',
            'Languages-create',
            'Languages-view',
            'Languages-edit',
            'Languages-delete',
            'Opportunities-list',
            'Opportunities-create',
            'Opportunities-view',
            'Opportunities-edit',
            'Opportunities-delete',
            'Positions-list',
            'Positions-create',
            'Positions-view',
            'Positions-edit',
            'Positions-delete',
            'Users-list',
            'Users-create',
            'Users-view',
            'Users-edit',
            'Users-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $permission = Permission::get()->pluck('name')->toArray();
        // $permissionUser = Permission::where('name', 'LIKE', '%-list')->orWhere('name', 'LIKE', '%-view')->get()->toArray();

        $permissionUser = [];
        foreach ($permission as $item) {
            $last = explode('-', $item);
            if ('list' == $last[1] || 'view' == $last[1]) {
                array_push($permissionUser, $item);
            }
        }

        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'api',
        ]);

        $admin->givePermissionTo($permission);

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'api',
        ]);
        $user->givePermissionTo($permissionUser);

        $adminUser = Users::create([
            'full_name' => 'admin aja',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => Hash::make('admin111'),
            'gender' => 'Pria',
        ]);

        $adminUser->assignRole($admin);

        $user1 = Users::create([
            'full_name' => 'user aja',
            'email' => 'user@nifty.com',
            'username' => 'user',
            'password' => Hash::make('user111'),
            'gender' => 'Pria',
        ]);

        $user1->assignRole($user);
    }
}
