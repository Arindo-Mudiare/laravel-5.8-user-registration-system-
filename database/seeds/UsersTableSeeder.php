<?php

use Illuminate\Database\Seeder;
use RegistrashunSystem\User;
use RegistrashunSystem\Role;
use Illuminate\Support\Facades\DB;

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

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);
        $author = User::create([
            'name' => 'Author',
            'email' => 'author@author.com',
            'password' => bcrypt('author123')
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user123')
        ]);

        // Attach roles to users

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

        factory(RegistrashunSystem\User::class, 40)->create();
    }
}
