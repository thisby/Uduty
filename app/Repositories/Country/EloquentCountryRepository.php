<?php namespace App\Repositories\Country;

class EloquentCountryRepository implements CountryRepository
{
    
    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT c FROM Countries c');
		$countries = $query->getResult(); // array of User objects);
		return $countries;
    }

}
