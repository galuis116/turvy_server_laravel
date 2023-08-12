<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@turvy.net',
            'mobile' => '+61478755540',
            'password' => bcrypt('Hurricane@#2022'),
            'is_approved' => 1
        ]);

        $role = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
    }
}
