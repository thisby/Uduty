<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

class HomeController extends Controller
{

    /**
     * @var strings
     */
    private $class = 'Continents';
    /**
     * @var EntityManager
     */
    private $em;   


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityManager $em)
    {
        $this->middleware('auth');
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
         $continents = $repository->findAll();
         //dump($continents);

         return view('home', ['continents' => $continents]);
    }

}
