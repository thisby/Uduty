<?php namespace App\Repositories\Items;
use Doctrine\ORM\EntityManager;

class EloquentItemsRepository implements ItemsRepository
{

	public function getAll()
	{
		$query = \EntityManager::createQuery('SELECT i FROM Items i');
		$items = $query->getResult(); // array of User objects);
		return $items;
	}
}
