<?php namespace App\Repositories\Trip;

class EloquentTripRepository implements TripRepository
{
    
    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT t FROM Entity\Trip t');
		$trips = $query->getResult(); // array of User objects);
		return $trips;
    }
}
