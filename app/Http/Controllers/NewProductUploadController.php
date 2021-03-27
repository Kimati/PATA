<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use Illuminate\Support\Facades\DB;
//use App\Asset;

class NewProductUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_upload');
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
        $this->validate($request,['product'=>'required','price'=>'required','phone'=>'required|10','region'=>'required','email'=>'required|email','image'=>'required']);
        $product=new Asset;
        $product->product=$request->input('product');
        $product->price=$request->input('price');
        $product->phone=$request->input('phone');
        $product->region=$request->input('region');
        $product->email=$request->input('email');
        $product->image=$request->input('image');
        $product->save();
        return redirect('newproduct')->with('success','product Posted successfully');
                //Checking if the product is a phone, machinery, bike or a wearale.
         //@if($product->product == 'phones')
         //return redirect('phones_upload');
         //@elseif($product->product == 'bikes')
         //return redirect('bikes_upload');
         //@elseif($product->product == 'wearables')
         //return redirect('wearables_upload');
         //@else
         //return redirect('machinery_upload');
        //$product->save();

        //return redirect('newproduct')->with('success','Product Posted successfully');
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

    //public function sameType(Phone $phoneitem)
    public function sameType(Request $request, $phoneitem)
    {
        //$phonetype=$phoneitem->name;
        $phonetype=$request->phoneitem;
       // dump('$phonetype');
        $matchingphones= DB::table('phones')->where('name', 'like', '%'.$phonetype.'%')->get();
       return view('matchingitems')->with('matchingphones',$matchingphones);

    }
}
