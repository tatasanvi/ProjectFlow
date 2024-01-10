<?php

namespace Database\Seeders;

     use Illuminate\Database\Seeder;
     use Illuminate\Support\Facades\DB;
     use Spatie\Permission\Models\Role;
     use App\Models\User;
     use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $user = User::create([
        'name'=>'admin',
        'email'=>'admin@admin.com',
        'mdp'=>'admin1234',
        'password'=> bcrypt('admin1234'),
        'tel'=>'91143053',
        'adresse'=>'logope',
        'sexe'=>'m',

    ]);




         $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
