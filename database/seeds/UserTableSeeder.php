<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Admin',
        'email'    => 'blog@blog.blog',
        'password' => Hash::make('adminblog'),
    ));
}

}