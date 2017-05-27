<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\ShopForm;
use Doctrine\ORM\EntityManager;

class ShopController extends Controller
{

    private $em;   


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityManager $em)
    {
        //$this->middleware('auth');
        $this->em = $em;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ShopForm::class, [            
            'method' => 'POST',            
            'url' => route('shop.store')
            ]);

        $items = [];
        $boughts = \Cart::content();
        //dump($boughts);
        foreach($boughts as $buy)
        {

            $bought = (object) [
            "id" => $buy->rowId,
            "dutyId" => $buy->id,
            'qty'=> $buy->qty,                   
            'name'=> $buy->name,
            'price' =>$buy->price
            ];
            $items[] = $bought;
        }

        //dump($items);

        return view('shop/index',array('form' => $form,'items' =>$items));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boughts = \Cart::content();
        $me = \Auth::user();
        $shopLines = [];
        foreach($boughts as $buy)
        {
            $shopLine = new \Shop();
            $shopLine->setDuty($this->em->find('Duties',$buy->id));
            $shopLine->setQty($buy->qty);
            $shopLine->setUser($this->em->find('Users',$me->id));
            $shopLines[] = $shopLine;
            
            $this->em->persist($shopLine);
            $this->em->flush();           
        }
        $this->reset();
        return view('shop/store');
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

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function reset()
    {
        \Cart::destroy();
    }
}
