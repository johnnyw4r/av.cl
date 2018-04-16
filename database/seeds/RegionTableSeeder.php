<?php

use Illuminate\Database\Seeder;
use App\Region;
class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['country_id'=>'1','name'=>'Región de Cuyo'],
            ['country_id'=>'1','name'=>'Región del NorEste'],
            ['country_id'=>'1','name'=>'Región del NorOeste'],
            ['country_id'=>'1','name'=>'Región de Pampea'],
            ['country_id'=>'1','name'=>'Región de Patagónica'],

            ['country_id'=>'2','name'=>'Región de Cuyo'],
            ['country_id'=>'2','name'=>'Región del NorEste'],
            ['country_id'=>'2','name'=>'Región del NorOeste'],
            ['country_id'=>'2','name'=>'Región de Pampea'],
            ['country_id'=>'2','name'=>'Región de Patagónica'],







   
        ];
        foreach ($data as $key => $value) {

            Region::create($value);

        }
    }
}
