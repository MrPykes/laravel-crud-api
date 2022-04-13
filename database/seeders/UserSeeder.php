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

        $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        $user = User::create([
            'name' => 'Juan Dela Cruz',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
        // $user->hasPermissionTo('product', 'admin');

        $user = User::create([
            'name' => 'Pedro Penduko',
            'email' => 'pedro@gmail.com',
            'password' => Hash::make('123123123'),
        ]);

        $user->givePermissionTo('product');
        // $user->givePermissionTo('admin');
    }
}
