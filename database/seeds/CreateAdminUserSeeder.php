<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
        	'firstname' => 'Admin',
        	'lastname' => 'Admin',
        	'phone' => '51454',
        	'gender' => '1',
        	'status' => '1',
        	'birthday' => '1998/01/01',
        	'email' => 'admin@admin.com',

        ],[
            'password' => bcrypt('admin')
        ]);

        $role = Role::updateOrCreate(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
