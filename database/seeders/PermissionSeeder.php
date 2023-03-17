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
       
        $Permission6 = Permission::create(['name'=>'create-user']);
        $Permission5 = Permission::create(['name'=>'viewAll-user']);
        Permission::create(['name'=>'view-user']);
        Permission::create(['name'=>'create-role']);
        Permission::create(['name'=>'update-role']);
        Permission::create(['name'=>'viewAll-role']);
        $Permission1 = Permission::create(['name'=>'assign-role']);
        $Permission2 = Permission::create(['name'=>'remove-role']);
        $Permission3 = Permission::create(['name'=>'assign-permission']);
        $Permission4 = Permission::create(['name'=>'remove-permission']);

        Role::create([
            'name'=>'User',
            'slug' => 'user']);
        Role::create([
            'name'=>'Super Admin',
            'slug' => 'Super Admin']);

       $user = User::create([
            'name' => 'admin',
            'email' => 'gelilahhamid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin!@12'),
        ]);

        $permissions = array($Permission1->id, $Permission2->id, $Permission3->id, $Permission4->id, $Permission5->id, $Permission6->id);
        $user->givePermission($permissions);

        
    }
}
