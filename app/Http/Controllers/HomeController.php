<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\Bike;
use App\Wearable;
use App\Machine;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        //$phone1=Phone::all();
       //$phone2=Phone::where('id','7');
       // $bikes=Bike::all();
       //return view('PATA')->with('phone1',$phone1)->with('bikes',$bikes)->with('phone2',$phone2);
        //Retrieving phones
        $phone1 = DB::table('phones')->where('id', '<', 5)->get();
        $bikes = DB::table('bikes')->where('id', '<', 5)->get();
        $wearables = DB::table('wearables')->where('id', '<', 5)->get();
        $machines = DB::table('machines')->where('id','<',5)->get();

        return view('PATA')->with('phone1',$phone1)->with('bikes',$bikes)->with('wearables',$wearables)->with('machines',$machines);

        //Retrieving the Bikes
        //$bikes = DB::table('bikes')->where('id', '<', 4)->get();
       // return view('PATA')->with('bikes',$bikes);
       

    }

    public function pata()
    {
        return view('PATA');
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
        //
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
