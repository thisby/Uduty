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
    	Eloquent::unguard();
        //$this->call(PaysTableSeeder::class);
        //$this->call(ObjectTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //$this->call(TripTableSeeder::class);
    }
}



class UserTableSeeder extends Seeder {
 
  public function run()
  {
		$faker = Faker\Factory::create('fr_FR');
		
	 	$trips = (array)DB::table('trip')->select('id')->pluck('id')->all();
	 	$pays = (array)DB::table('pays')->select('id')->pluck('id')->all();	 	
		$objects = (array)DB::table('objet')->select('id')->pluck('id')->all();	 	
		for ($i = 0; $i < 30; $i++)
		{
		  DB::table('user')->insert([
			'nom' => $faker->lastName,
			//'duty_id' => $i,
			//'duty_objet_id' => $faker->randomElement($objects),
			//'trip_id' => $faker->randomElement($trips),
			'prenom' => $faker->firstName,
			'email' => $faker->safeEmail,
			'salt' => $faker->word,
			'password_hash' =>  Hash::make($faker->password),	
			'adresse' => $faker->streetAddress,
			'location_id' => $faker->randomElement($pays),
			'telephone' => $faker->phoneNumber
		  ]);
		}
		
  	}
 
}


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
		  DB::table('pays')->insert([
		    'id' => $i,//$faker->unique($reset = true)->randomDigitNotNull,
			'nom' => $faker->country,
			'nom_court' => $faker->countryCode
		  	]);
		}
   }
}




/*

'id',
'pays_id',
'transport_id',
'user_id',
'date_depart',
'date_fin'

*/


class TripTableSeeder extends Seeder {
 
  public function run()
  {
  		$faker = Faker\Factory::create();
  		$pays = DB::table('pays')->select('id')->pluck('id')->all();
		for ($i = 0; $i < 100; $i++)
		{
		  DB::table('trip')->insert([
		    'id' => $i,//$faker->unique($reset = true)->randomDigitNotNull,
			'pays_id' => $faker->randomElement($pays),
			'transport_id' => $faker->randomDigitNotNull,
			'user_id' => $faker->randomDigitNotNull,
			'date_depart' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
			'date_fin' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s')
		  	]);
		}
  }
 
}

class DutyTableSeeder extends Seeder {
 
  public function run()
  {
  
  }
 
}


/*
'id',
'nom',
'desc',
'pays_id',
'local_prix',
'image'
*/

class ObjectTableSeeder extends Seeder {
 
  public function run()
  {
  		$faker = Faker\Factory::create();
  		$pays = (array)DB::table('pays')->select('id')->pluck('id')->all();
		for ($i = 0; $i < 100; $i++)
		{
		  DB::table('objet')->insert([
		    'id' => $i,//$faker->unique($reset = true)->randomDigitNotNull,
			'nom' => $faker->word,
			'desc' => $faker->text($maxNbChars = 200),
			'pays_id' => $faker->randomElement($pays),
			'local_prix' => $faker->randomNumber(2),
			'image' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}')
		  	]);
		}
  }
 
}