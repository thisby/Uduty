<?php namespace App\Repositories\Duties;

use Doctrine\ORM\EntityManager;


class EloquentDutiesRepository implements DutiesRepository
{
    
    /**
     * @var EntityManager
     */
    private $em;       


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }



    public function getAll()
    {
        $query = \EntityManager::createQuery('SELECT d FROM duties d');
		$duties = $query->getResult(); // array of User objects);
		return $duties;
    }


    //get all duties located in country based on continent code
    public function getDutiesByContinent($continentCode)
    {
        $dutiesQ = \EntityManager::createQuery('SELECT d FROM duties d JOIN countries c WITH c.countryId = d.country WHERE c.continentCode = :continentCode');
		$dutiesQ->setParameter('continentCode', $continentCode);
        $dutiesQ->setFetchMode('duties', 'item', 3);        
        $duties = $dutiesQ->getResult();
		return $duties;        
    }

    public function getLastId()
    {
        $query = \EntityManager::createQuery('SELECT d FROM duties d ORDER BY d.id DESC');
        $query = $query->setMaxResults(1);
        $duty = $query->getResult(); // array of User objects);
        return $duty;
    }
}
