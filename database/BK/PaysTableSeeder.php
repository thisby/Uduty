<?php
namespace E;
use app\Entity\Countries;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder {
 

     /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
  {
	  	$faker = Faker\Factory::create();
	 
		for ($i = 0; $i < 100; $i++)
		{
		  $countries = Countries::create(array(
		    `id` => $faker->unique(),
			`nom` => $faker->nom,
			`nom_court` => $faker->nom_court
		  ));
		}
   }
}