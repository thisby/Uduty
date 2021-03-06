<?php namespace App\Repositories\Trip;

class EloquentTripRepository implements TripRepository
{
    
    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT t FROM Trips t');
		$trips = $query->getResult(); // array of User objects);
		return $trips;
    }

    public function getTripsByUser($user)
    {
        $query = \EntityManager::createQuery('SELECT t FROM Trips t WHERE t.user = :user');
        $query->setParameter('user', $user);
        //$query->setFetchMode('trip', 'countries', 3);        
        $trips = $query->getResult();
        return $trips;        
    }
}
