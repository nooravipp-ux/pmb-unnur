<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','keuangan')->first();
        $userRole = Role::where('name','prodi')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin719'), 
        ]);

        $author = User::create([
            'name' => 'Keuangan',
            'email' => 'keuangan@keuangan.com',
            'password' => Hash::make('admin719'), 
        ]);

        $user = User::create([
            'name' => 'Prodi',
            'email' => 'prodi@prodi.com',
            'password' => Hash::make('admin719'), 
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($adminRole);
        $user->roles()->attach($adminRole);
    }
}
