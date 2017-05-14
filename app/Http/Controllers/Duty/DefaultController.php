<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\EntityManagerInterface;

use app\Model\Entity\Continents;

class DefaultController extends Controller
{

    /**
     * @var string
     */
    private $class = 'Entity\Continents';
    /**
     * @var EntityManager
     */
    private $em;       


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $repository = $this->em->getRepository($this->class);
         $continents = $repository->getAll();
         return view('default', ['continents' => $continents]);
    }
}
?>