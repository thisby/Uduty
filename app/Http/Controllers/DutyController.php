<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\EntityManagerInterface;

use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\Forms\DutyForm;

class DutyController extends Controller
{

    use FormBuilderTrait;

    /**
     * @var string
     */
    private $class = 'Duties';
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
    public function list($continentCode)
    {

     $repository = $this->em->getRepository($this->class);

       //dump($repository);
       //dump($this->em->getRepository('Objects')->getAll()[0]);
     $dutiesByContinent = $repository->getDutiesByContinent($continentCode);


     //dump($repository->findById(0));

     $repository = $this->em->getRepository('Countries');
     $countriesByContinent = $repository->findByContinentCode($continentCode);

     //dump(\Duties::find(1));

     $duties = [];
     dump($dutiesByContinent[0]);
       //dump($dutiesByContinent[0]->getObject());
       //dump($dutiesByContinent[0]->getCountry());
     $repository = $this->em->getRepository('Items');

     foreach($dutiesByContinent as $duty)
     {
        //dump($duty->getCountry());
        $duties[] = 
        array(
            'id' => $duty->getId(),
            'nom' => $duty->getItem()->getName(),
            'prix' =>$duty->getItem()->getLocalPrix(),
            'countryId' => $duty->getCountry(),
            'content' => $duty->getContenu()
            );
    }

    $countries = [];

    foreach($countriesByContinent as $country)
    {
        $countries[] = 
        array(
            'nom' => $country->getName(),
            'code' => $country->getCode(),
            'countryId' => $country->getCountryId()
            );
    }

         //dump($duties);

    return view('duty.list', ['duties' => $duties,'countries' => $countries]);
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $countries_list = $this->em->getRepository('Entity\Countries')->findAll();

        foreach($countries_list as $country)
        {
            $countries[] = array('name' => $country->getName(),'id' => $country->getCountryId());
        }

        $objects_list = $this->em->getRepository('Entity\Objet')->getAll();

        foreach($objects_list as $object)
        {
            $objects[] = array('name' => $object->getNom(),'id' => $object->getId());
        }

        //dump($objects);

        $form = $formBuilder->create(DutyForm::class, [            
            'method' => 'POST',            
            'url' => route('duty.store')
            ]);


        return view('duty.create', array('form' => $form,'countries' => $countries,'objects' => $objects));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $this->form(DutyForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        //dump($request);
        
        $fieldValue = $form->getFieldValues();
        $createdId = $this->em->getRepository('Entity\Duty')->getLastId();




        $duty = new Entity\Duty();
        $duty->setId($createdId[0]->getId() + 1);
        $duty->setTitle($fieldValue['Title']);
        $duty->setContenu($fieldValue['Description']);
        $duty->setIsFree($fieldValue['Is_Free']);
        $duty->setPrixMinimum($fieldValue['MinimumPrice']);
        $duty->setPrixMaximum($fieldValue['MaximumPrice']);
        //$duty->setObjetId($fieldValue['object']);
        $duty->setCountriesList($fieldValue['country']);

        dump($fieldValue);

        //$this->em->persist($duty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
