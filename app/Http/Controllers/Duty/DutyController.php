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


     $repository = $this->em->getRepository('Countries');
     $countriesByContinent = $repository->findByContinentCode($continentCode);

     //dump(\Duties::find(1));

     $duties = [];

     foreach($dutiesByContinent as $duty)
     {
        //dump($duty->getCountry());
        $duties[] = 
        array(
            'id' => $duty->getId(),
            'nom' => $duty->getItem()->getName(),
            'prix' =>$duty->getItem()->getLocalPrix(),
            'countryId' => $duty->getCountry()->getCountryId(),
            'content' => $duty->getContenu()
            );
    }

    //dump($duties[0]);


    $countries = [];

    foreach($countriesByContinent as $country)
    {
        $code = strtolower($country->getCode());
        $countries[] = 
        array(
            'nom' => $country->getName(),
            'code' => $code,
            'countryId' => $country->getCountryId(),
            'flagClass' => 'flag flag-'.$code
            );
    }
    
    //dump($countries);

    return view('duty.list', ['duties' => $duties,'countries' => $countries,'continentCode' => $continentCode]);
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
        $countries_list = $this->em->getRepository('Countries')->findAll();

        foreach($countries_list as $country)
        {
            $countries[] = array('name' => $country->getName(),'id' => $country->getCountryId());
        }

        $objects_list = $this->em->getRepository('Items')->getAll();

        foreach($objects_list as $object)
        {
            $objects[] = array('name' => $object->getName(),'id' => $object->getId());
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
        $me = \Auth::id();

        $user = $this->em->find("Users",$me);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        //dump($request);
        
        $fieldValue = $form->getFieldValues();
        $createdId = $this->em->getRepository('Duties')->getLastId();
        $country = $this->em->find('Countries',$request['Country']);
        $item = $this->em->find('Items',$request['Item']);
        //dump($fieldValue);
        //dump(new \DateTime($fieldValue['UltimatumDate']));

        $duty = new \Duties();
        $duty->setId($createdId[0]->getId() + 1);
        $duty->setTitle($fieldValue['Title']);
        $duty->setContenu($fieldValue['Description']);
        $duty->setIsFree(is_null($fieldValue['Is_Free']) ? 0 : 1);
        $duty->setMinPrice($fieldValue['MinimumPrice']);
        $duty->setMaxPrice($fieldValue['MaximumPrice']);
        $duty->setUltimatumDate(new \DateTime($fieldValue['UltimatumDate']));
        $duty->setItem($item);
        $duty->setImage($fieldValue['Title']);
        $duty->setUser($user);
        $duty->setCountry($country);

        //dump($fieldValue);

        $this->em->persist($duty);
        $this->em->flush();

        return view('duty.store');
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
