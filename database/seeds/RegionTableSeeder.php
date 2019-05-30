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

//            ['country_id'=>'1','name'=>'Buenos Aires'],
//            ['country_id'=>'1','name'=>'Catamarca'],
//            ['country_id'=>'1','name'=>'Chacao'],
//            ['country_id'=>'1','name'=>'Chubut'],
//            ['country_id'=>'1','name'=>'Córdoba'],
//            ['country_id'=>'1','name'=>'Corrientes'],
//            ['country_id'=>'1','name'=>'Entre Ríos'],
//            ['country_id'=>'1','name'=>'Formosa'],
//            ['country_id'=>'1','name'=>'Jujuy'],
//            ['country_id'=>'1','name'=>'La Pampa'],
//            ['country_id'=>'1','name'=>'La Rioja'],
//            ['country_id'=>'1','name'=>'Mendoza'],
//            ['country_id'=>'1','name'=>'Misiones'],
//            ['country_id'=>'1','name'=>'Neuquén'],
//            ['country_id'=>'1','name'=>'Río Negro'],
//            ['country_id'=>'1','name'=>'Salta'],
//            ['country_id'=>'1','name'=>'San Juan'],
//            ['country_id'=>'1','name'=>'San Luís'],
//            ['country_id'=>'1','name'=>'Santa Cruz'],
//            ['country_id'=>'1','name'=>'Santa Fé'],
//            ['country_id'=>'1','name'=>'Santiago del estero'],
//            ['country_id'=>'1','name'=>'Tierra del fuego'],
//            ['country_id'=>'1','name'=>'Tucumán'],
            ['country_id'=>'1','name'=>'Región de Cuyo1'],
            ['country_id'=>'1','name'=>'Región del NorEste'],
            ['country_id'=>'1','name'=>'Región del NorOeste'],
            ['country_id'=>'1','name'=>'Región de Pampea'],
            ['country_id'=>'1','name'=>'Región de Patagónica'],

            ['country_id'=>'2','name'=>'Región de Cuyo'],
            ['country_id'=>'2','name'=>'Región del NorEste'],
            ['country_id'=>'2','name'=>'Región del NorOeste'],
            ['country_id'=>'2','name'=>'Región de Pampea'],
            ['country_id'=>'2','name'=>'Región de Patagónica'],

            ['country_id'=>'3','name'=>'Acre'],
            ['country_id'=>'3','name'=>'Alegolas'],
            ['country_id'=>'3','name'=>'Amapá'],
            ['country_id'=>'3','name'=>'Amazonas'],
            ['country_id'=>'3','name'=>'Bahía'],
            ['country_id'=>'3','name'=>'Ceará'],
            ['country_id'=>'3','name'=>'Espírito Santo'],
            ['country_id'=>'3','name'=>'Goiás'],
            ['country_id'=>'3','name'=>'Maranhão'],
            ['country_id'=>'3','name'=>'Mato Grosso'],
            ['country_id'=>'3','name'=>'Mato Grosso del Sur'],
            ['country_id'=>'3','name'=>'Minas Gerais'],
            ['country_id'=>'3','name'=>'Estado de Pará'],
            ['country_id'=>'3','name'=>'Paraíba'],
            ['country_id'=>'3','name'=>'Paraná'],
            ['country_id'=>'3','name'=>'Estado de Pernambuco'],
            ['country_id'=>'3','name'=>'Piauí'],
            ['country_id'=>'3','name'=>'Río de Janeiro'],
            ['country_id'=>'3','name'=>'Río Grande del Norte'],
            ['country_id'=>'3','name'=>'Río Grande del Sur'],
            ['country_id'=>'3','name'=>'Rondónia'],
            ['country_id'=>'3','name'=>'Roraima'],
            ['country_id'=>'3','name'=>'Santa Catarina'],
            ['country_id'=>'3','name'=>'Sao Paulo'],
            ['country_id'=>'3','name'=>'Sergipe'],
            ['country_id'=>'3','name'=>'Tocantis'],
            ['country_id'=>'3','name'=>'Distrito Federal'],

            ['country_id'=>'4','name'=>'Región de Arica'],
            ['country_id'=>'4','name'=>'Región de Antofagasta'],
            ['country_id'=>'4','name'=>'Región de Atacama'],
            ['country_id'=>'4','name'=>'Región de Coquimbo'],
            ['country_id'=>'4','name'=>'Región de Valparaiso'],
            ['country_id'=>'4','name'=>'Región de Libertador Bernardo O´Higgins'],
            ['country_id'=>'4','name'=>'Región del Maule'],
            ['country_id'=>'4','name'=>'Región del Bio-Bio'],
            ['country_id'=>'4','name'=>'Región de La Arauanía'],
            ['country_id'=>'4','name'=>'Región de Los Ríos'],
            ['country_id'=>'4','name'=>'Región de Los Lagos'],
            ['country_id'=>'4','name'=>'Región de Aysén del Grl. Carlos Ibañes del Campo'],
            ['country_id'=>'4','name'=>'Región de Magallanes y Antartica'],
            ['country_id'=>'4','name'=>'Región de Arica y Parinacota'],
            ['country_id'=>'4','name'=>'Región Metropolitana'],




   
        ];
        foreach ($data as $key => $value) {

            Region::create($value);

        }
    }
}
