<?php

use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  App\User::create([
            'name'=>'Admin',
            'email'=>'admin@jblog.com',
            'password'=>bcrypt('password'),
            'admin'=> 1,

        ]);


       App\Profile::create([
           'user_id'=>$user->id,
           'avatar'=>'img/jet.png',
					 'facebook_url' => 'https://facebook.com/jblog',
           'twitter_url'=>'https://twitter.com/jblog',
           'description'=>'This is The Admins Account',
       ]);
    }
}
