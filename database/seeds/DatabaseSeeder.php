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
    	$this->call(ItemTableSeeder::class);
    	$this->call(UserTableSeeder::class);        
    	$this->call(TripTableSeeder::class);
    	$this->call(DutyTableSeeder::class);
    	$this->call(ShopTableSeeder::class);

    }
}



class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create('fr_FR');
		
		$trips = (array)DB::table('trips')->pluck('id')->all();
		$countries = (array)DB::table('countries')->pluck('country_id')->all();	 	
		$items = (array)DB::table('items')->pluck('id')->all();	 	
		if (DB::table('users')->where('email','admin@example.org')->count() == 0)
		{
			DB::table('users')->insert([
				'name' => 'admin',
				'email' => 'admin@example.org',
				'password' => Hash::make('password'),
				'remember_token' => $faker->sha256,
				'created_at'    => $faker->dateTime(),
				'updated_at' => $faker->dateTimeInInterval($startDate = '+ 1 days', $interval = '+ 5 days', $timezone = date_default_timezone_get())   
				]);
		}
		for ($i = 0; $i < 10; $i++)
		{
			DB::table('users')->insert([
				'name' => $faker->lastName,
			//'duty_id' => $i,
			//'duty_objet_id' => $faker->randomElement($objects),
			//'trip_id' => $faker->randomElement($trips),
			//'prenom' => $faker->firstName,
				'email' => $faker->safeEmail,
			//'salt' => $faker->word,
				'password' =>  $faker->password,	
				'remember_token' => $faker->sha256,
				'created_at'    => $faker->dateTime(),
				'updated_at' => $faker->dateTimeInInterval($startDate = '+ 1 days', $interval = '+ 5 days', $timezone = date_default_timezone_get())        

			//'adresse' => $faker->streetAddress,
			//'location_id' => $faker->randomElement($countries),
			//'telephone' => $faker->phoneNumber
				]);
		}
		
	}

}




class TripTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();
		$countries = DB::table('countries')->pluck('country_id')->all();
		$users = (array)DB::table('users')->pluck('id')->all();

		for ($i = 0; $i < 10; $i++)
		{
			DB::table('trips')->insert([
		    //'id' => $i,//$faker->unique($reset = true)->randomDigitNotNull,
				'country_id' => $faker->randomElement($countries),
				'transport_id' => $faker->randomDigitNotNull,
				'user_id' => $faker->randomElement($users),
				'departure_date' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
				'end_date' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s')
				]);
		}
	}

}

class DutyTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create('fr_FR');

		$countries = (array)DB::table('countries')->pluck('country_id')->all();    
		$items = (array)DB::table('items')->pluck('id')->all();  
		$items = $faker->shuffle($items);

		$users = (array)DB::table('users')->pluck('id')->all();

		for ($i = 0; $i < 100; $i++)
		{
			DB::table('duties')->insert([
				'item_id' => $faker->randomElements($items)[0],
				'contenu' => $faker->text,            
				'country_id' => $faker->randomElements($countries)[0],
				'is_free' => $faker->randomElements([0,1])[0],
				'min_price' => $faker->numerify('##'),
				'max_price' => $faker->numerify('###'),
				'ultimatum_date' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s') ,
				'image' => $faker->asciify('********'),
				'user_id' => $faker->randomElements($users)[0],
				'title' => $faker->words(5,true)
				]);
		}
	}

}



class ItemTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();
		$countries = (array)DB::table('countries')->pluck('country_id')->all();
		for ($i = 0; $i < 100; $i++)
		{
			DB::table('items')->insert([
		    //'id' => $i,//$faker->unique($reset = true)->randomDigitNotNull,
				'name' => $faker->word,
				'desc' => $faker->text($maxNbChars = 200),
				'country_id' => $faker->randomElement($countries),
				'local_prix' => $faker->randomNumber(2),
				'image' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}')
				]);
		}
	}

}

class ShopTableSeeder extends Seeder{
	public function run()
	{
		$faker = Faker\Factory::create();
		$duties = (array)DB::table('duties')->pluck('id')->all();
		$users = (array)DB::table('users')->pluck('id')->all();

		for ($i = 0; $i < 100; $i++)
		{
			DB::table('shop')->insert([
		    //'id' => $i,//$faker->unique($reset = true)->randomDigitNotNull,
				'duty_id' => $faker->randomElement($duties),
				'qty' => $faker->randomNumber(2),
				'user_id' => $faker->randomElement($users)
				]);
		}
	}
}