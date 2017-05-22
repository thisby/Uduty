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
    	$query = $this->em->createQuery('SELECT i FROM Model\Items i');
		$objects = $query->getResult(); // array of User objects);
		return $objects;
}
}
