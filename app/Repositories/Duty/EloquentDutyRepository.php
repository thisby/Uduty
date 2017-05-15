<?php namespace App\Repositories\Duty;

use Doctrine\ORM\EntityManager;

class EloquentDutyRepository implements DutyRepository
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
        $query = \EntityManager::createQuery('SELECT d FROM Entity\Duty d');
		$duties = $query->getResult(); // array of User objects);
		return $duties;
    }


    //get all duties located in country based on continent code
    public function getDutiesByContinent($continentCode)
    {
        $dutiesQ = \EntityManager::createQuery('SELECT d FROM Entity\Duty d JOIN Entity\Countries c WITH c.countryId = d.countries_list WHERE c.continentCode = :continentCode');
		$dutiesQ->setParameter('continentCode', $continentCode);
        $duties = $dutiesQ->getResult();
		return $duties;        
    }
}
