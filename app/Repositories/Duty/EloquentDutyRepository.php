<?php namespace App\Repositories\Duty;

class EloquentDutyRepository implements DutyRepository
{
    
    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT d FROM Entity\Duty d');
		$duties = $query->getResult(); // array of User objects);
		return $duties;
    }
}
