<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(ShopForm::class, [            
            'method' => 'POST',            
            'url' => route('shop.index')
            ]);

        $items = [];
        $boughts = \Cart::content();
        //dump($boughts);
        foreach($boughts as $buy)
        {

            $bought = (object) [
            "id" => $buy->id,
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cardItem = \Cart::add($request->id, $request->name, 1, $request->price);
        $cardAssociation = \Cart::associate($cardItem->rowId,'Duties');

        return 'Item was added to your cart!';
        //return redirect('Duty')->withSuccessMessage('Item was added to your cart!');
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
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            // Validation on max quantity
            $validator = \Validator::make($request->all(), [
                'quantity' => 'required|numeric|between:1,10'
                ]);

            if ($validator->fails()) {
                session()->flash('error_message', 'Error on update item');
                return response()->json(['success' => false]);
            }

            \Cart::update($id, $request->quantity);
            session()->flash('success_message', '');

            return response()->json(['success' => true]);
        } else {
            return view('errors.503');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);
        return redirect('Duty')->withSuccessMessage('Item has been removed!');
    }

}
