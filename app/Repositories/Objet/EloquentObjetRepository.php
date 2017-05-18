<?php namespace App\Repositories\Objet;

use Doctrine\ORM\EntityManager;

class EloquentObjetRepository implements ObjetRepository
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
		$query = \EntityManager::createQuery('SELECT o FROM Entity\Objet o');
		$objects = $query->getResult(); // array of User objects);
		return $objects;
	}
}
