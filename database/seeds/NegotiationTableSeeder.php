<?php

use Illuminate\Database\Seeder;

class NegotiationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(App\Negotiation::class,20)->create();
    }
}
