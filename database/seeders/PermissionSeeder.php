<?php

namespace Database\Seeders;

use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\Auth\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Permission::create(['name'=>'create-user']);
        Permission::create(['name'=>'viewAll-user']);
        Permission::create(['name'=>'create-role']);
        Permission::create(['name'=>'update-role']);
        Permission::create(['name'=>'viewAll-role']);
        Permission::create(['name'=>'assign-role']);
        Permission::create(['name'=>'delete-role']);

        Role::create([
            'name'=>'User',
            'slug' => 'user']);
        Role::create([
            'name'=>'Super Admin',
            'slug' => 'Super Admin']);

       User::create([
            'name' => 'admin',
            'email' => 'gelilahhamid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin!@12'),
        ]);

        
    }
}
