<?php

use Illuminate\Database\Seeder;
 
class UserTableSeeder extends Seeder {
 
  public function run()
  {
  $user = User::create(array(
	`nom` => 'admin',
	`duty_id` => '-1',
	`duty_objet_id` => '-1',
	`trip_id` => '-1',
	`prenom` => 'admin',
	`email` => 'admin@duty',
	`password_hash` => 'k8u7MMBy4MNyo',
	`salt` => 'k8',
	`adresse` => 'une addrese',
	`location_id` => '-1',
	`telephone` => '0423123654'
	));

$faker = Faker\Factory::create();
 
for ($i = 0; $i < 100; $i++)
{
  $user = User::create(array(
`nom` => $faker->nom,
	`duty_id` => $faker->duty_id,
	`duty_objet_id` => $faker->duty_objet_id,
	`trip_id` => $faker->trip_id,
	`prenom` => $faker->prenom,
	`email` => $faker->email,
	`salt` => $faker->salt,
	`password_hash` =>  Hash::make($faker->salt),	
	`adresse` => $faker->adresse,
	`location_id` => $faker->location_id,
	`telephone` => $faker->telephone
  ));
}


  }
 
}