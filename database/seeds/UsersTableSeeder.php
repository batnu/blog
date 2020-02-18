<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);
        $viewPostPermission = Permission::create(['name' => 'View posts']);
        $createPostPermission = Permission::create(['name' => 'Create posts']);
        $updatePostPermission = Permission::create(['name' => 'Update posts']);
        $deletePostPermission = Permission::create(['name' => 'Delete posts']);



        $admin = new User;
        $admin->name = "Pedro";
        $admin->email = "batnusan@gmail.com";
        $admin->password = "123456";
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "Pepe";
        $writer->email = "pepe@email.es";
        $writer->password = "123456";
        $writer->save();
        $writer->assignRole($writerRole);
        $writer->assignRole($adminRole);


        $users = factory(User::class, 8)->make();

        $users->each(function ($u) use ($writerRole){
            $u->save();
            $u->assignRole($writerRole);
        });
    }
}
