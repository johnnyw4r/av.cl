<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,29)->create();

        App\User::create([
        	'name'		=> 'Johnny Aracena',
        	'gender' 	=> 'M',
            'email'     => 'johnny.aracena@gmail.com',
        	'password'	=> bcrypt('gargolas'),
        	'country'	=> 'Chile',
        	'region'	=> 'Coquimbo',
        	'mobile'	=> '+56973678272',
        ]);
    }
}
