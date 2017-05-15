<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\EntityManagerInterface;

use app\Model\Entity\Duty;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\DutyForm;


class DutyController extends Controller
{

    /**
     * @var string
     */
    private $class = 'Entity\Duty';
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
         $dutiesByContinent = $repository->getDutiesByContinent($continentCode);

         $repository = $this->em->getRepository('Entity\Countries');
         $countriesByContinent = $repository->findByContinentCode($continentCode);


         $duties = [];

         foreach($dutiesByContinent as $duty)
         {
            $duties[] = 
            array(
                'id' => $duty->getId(),
                'nom' => $duty->getObjet()->getNom(),
                'prix' =>$duty->getObjet()->getLocalPrix(),
                'countryId' => $duty->getCountriesList(),
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
            $form = $formBuilder->create(DutyForm::class, [
            'method' => 'POST',
            'url' => route('duty.store')
        ]);

        return view('duty.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(DutyForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

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
