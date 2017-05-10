<?php
 

use Illuminate\Database\Seeder;
use App\Model\{Model};
class PaysTableSeeder extends Seeder {
 

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
		  $pays = Pays::create(array(
		    `id` => $faker->unique(),
			`nom` => $faker->nom,
			`nom_court` => $faker->nom_court
		  ));
		}
   }
}