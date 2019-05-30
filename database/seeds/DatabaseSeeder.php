<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(SubCategoryTableSeeder::class);
         $this->call(PostTableSeeder::class);
//         $this->call(EvaluationTableSeeder::class);
  //       $this->call(NegotiationTableSeeder::class);
    //     $this->call(CommentTableSeeder::class);
      //   $this->call(PhotoTableSeeder::class);
         $this->call(CountryTableSeeder::class);
         $this->call(RegionTableSeeder::class);
    }
}
