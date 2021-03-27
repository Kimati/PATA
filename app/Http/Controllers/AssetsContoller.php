<?php

namespace App\Http\Controllers;
use App\Asset;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AssetsContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("new_asset");
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
         $this->validate($request,['name'=>'required','price'=>'required','phone'=>'required|min:10|max:10','region'=>'required','email'=>'required|email','image'=>'required']);
        $product=new Asset;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->seller_phone=$request->input('phone');
        $product->seller_region=$request->input('region');
        $product->seller_email=$request->input('email');
        $product->image=$request->input('image');
        $product->save();
        return redirect('newasset')->with('success','Asset Posted successfully');
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
