<?php

namespace Database\Seeders;

use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permissions = new Permission();
        $permissions->name = 'create user';
        $permissions->slug = 'create-user';
        $permissions->save();
        Role::create([
            'name'=>'user',
            'slug' => 'user'
        ]);

        
    }
}
