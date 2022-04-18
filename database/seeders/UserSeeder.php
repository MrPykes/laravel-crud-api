<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'product']);


        // $permission->assignRole($role);

        $user = User::create([
            'name' => 'Test Account User',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
        // $user->hasPermissionTo('product', 'admin');

        $user = User::create([
            'name' => 'Test Account Admin',
            'email' => 'testadmin@gmail.com',
            'password' => Hash::make('123123123'),
        ]);

        $user->givePermissionTo($permission);
        $user->assignRole($role);
    }
}
