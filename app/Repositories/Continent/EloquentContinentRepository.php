<?php 

namespace App\Repositories\Continent;

use Doctrine\ORM\EntityManager;

class EloquentContinentRepository implements ContinentRepository
{
    
    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT c FROM Continents c');
		$continents = $query->getResult(); // array of User objects);
		return $continents;//
    }
}
