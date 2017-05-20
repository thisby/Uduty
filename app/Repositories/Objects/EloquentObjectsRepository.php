<?php namespace App\Repositories\Objects;

use Doctrine\ORM\EntityManager;


class EloquentObjectsRepository implements ObjectsRepository
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
    	$query = $this->em->createQuery('SELECT o FROM Objects o');
		$objects = $query->getResult(); // array of User objects);
		return $objects;
}
}
