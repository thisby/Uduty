<?php namespace App\Repositories\Continent;

class EloquentContinentRepository implements ContinentRepository
{
    
    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT c FROM Entity\Continents c');
		$continents = $query->getResult(); // array of User objects);
		return $continents;//
    }
}
