<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['name'=>'Argentina'],
            ['name'=>'Bolivia'],
            ['name'=>'Brasil'],
            ['name'=>'Chile'],
            ['name'=>'Colombia'],
            ['name'=>'Costa Rica'],
            ['name'=>'Cuba'],
            ['name'=>'Ecuador'],
            ['name'=>'España'],
            ['name'=>'El Salvador'],
            ['name'=>'Guatemala'],
            ['name'=>'Haití'],
            ['name'=>'Honduras'],
            ['name'=>'México'],
            ['name'=>'Nicaragua'],
            ['name'=>'Panamá'],
            ['name'=>'Perú'],
            ['name'=>'República Dominicana'],
            ['name'=>'Uruguay'],
            ['name'=>'Venezuela'],
        ];
        foreach ($data as $key => $value) {

            Country::create($value);

        }
    }
}
