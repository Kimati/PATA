<?php

namespace App\Http\Controllers;
use App\Machine;
use App\ProductRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("new_machine");
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
        $this->validate($request,['name'=>'required','price'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required','image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        $product=new Machine;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->seller_phone=$request->input('phone');
        $product->seller_email=$request->input('email');
        $product->county=$request->input('county');
        $product->subcounty=$request->input('subcounty');
        $product->division=$request->input('division');
        $product->location=$request->input('location');
        $image= $request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("uploadedimages"),$new_name);
        $product->image=$new_name;

        $product->save();
        return redirect('newmachine')->with('success','Machine Posted successfully');
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

    public function sameType(Request $request, $machineitem)
    {
        $machinetype = $request->machineitem;
        $matchingmachine = DB::table('machines')->where('name','like','%'. $machinetype.'%')->get();
        return view('similarmachine')->with('matchingmachine',$matchingmachine);
    }

    public function reqMachine($mid,$mname)
    {
     $reqmachineid = $mid;
     $machinename = $mname;
     $machinetype = "Machine";

     return view('machinereqdetails')->with('reqmachineid',$reqmachineid)->with('machinename',$machinename)->with('machinetype',$machinetype);

    }

    public function reqMachineStore(Request $request)
    {
           $this->validate($request,['fname'=>'required','sname'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required']);

      $reqMachineType = session()->get('machineType');
      $reqMachineId = session()->get('reqMachineId');
      $reqMachineName = session()->get('reqMachineName');

      //Getting Phone Seller Infor
      //$reqProdSeller = session()->get('reqPhoneSeller');
      //$reqProdPrice = session()->get('reqPhonePrice');

      $machineSeller = DB::table('machines')->where('id','like','%'. $reqMachineId.'%')->get();
      foreach($machineSeller as $seller)
      {
        $msellerphone = $seller->seller_phone;
        $msellermail = $seller->seller_email;
       // $reqPhoneName = $seller->name;

      }
     // global $sellerphone;
     // global $sellermail;
   
       //$sellerphon = $sellerphone;
       //$selleremail = $sellermail;

        $prodrequest = new ProductRequest;

        $prodrequest->product_type = $reqMachineType;
        $prodrequest->product_name = $reqMachineName;
        $prodrequest->req_fname = $request->input('fname');
        $prodrequest->req_sname = $request->input('sname');
        $prodrequest->req_phone = $request->input('phone');
        $prodrequest->req_email = $request->input('email');
        $prodrequest->county = $request->input('county');
        $prodrequest->subcounty = $request->input('subcounty');
        $prodrequest->division = $request->input('division');
        $prodrequest->location = $request->input('location');
        $prodrequest->seller_phone =  $msellerphone;
        $prodrequest->seller_email = $msellermail;
         

        $prodrequest->save();
        return redirect('/Homeretrieve')->with("requestPlaced","Machine Request was placed successfully. PATA is for you.");

    }


    //Handling Machines by admin

    public function allMachines()
    {
        $approvedMachines = Machine::all()->toArray();
        return view('approvedmachines',compact('approvedMachines', $approvedMachines));
    }


    //Change Machine Status
public function changeStatus($status)
{
$machineid = $status;
$inStore = "In store";
$outStore = "Out Store";
//$targetbike = Bike::where('id', 'like', '%'.$bikeid.'%')->get();
$targetmachine = Machine::find($machineid);

if($targetmachine)
{
    if($targetmachine->status == $outStore)
    {
        $targetmachine->status = $inStore;
        $targetmachine->save();
    }
    elseif($targetmachine->status == $inStore)
    {
        $targetmachine->status = $outStore;
        $targetmachine->save();
    }
    else
    {
       $targetmachine->status = $outStore;
       $targetmachine->save();
    }

}
return redirect('/handleMachines');

}

public function deleteMachine($deletemachineid)
{
    Machine::where('id',$deletemachineid)->delete();
    return redirect('/handleMachine');
}
}
