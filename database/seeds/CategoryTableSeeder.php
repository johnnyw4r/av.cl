<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Category::class,10)->create();

        $data = [

            ['name'=>' Todas las Categorías'],
            ['name'=>'Inmuebles'],
            ['name'=>'Vehículos'],
            ['name'=>'Hogar'],
            ['name'=>'Moda, Calzado, Belleza, y Salud'],
            ['name'=>'Futura mamá, Bebes, Niños'],
            ['name'=>'Tiempo Libre'],
            ['name'=>'Computación y Electrónica'],
            ['name'=>'Servicios, Negocios, y Empleos'],
            ['name'=>'Otros'],
            
        ];
        foreach ($data as $key => $value) {

            Category::create($value);

        }
    }
}
