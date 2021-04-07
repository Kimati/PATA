<?php

namespace App\Http\Controllers;
use App\Bike;
use App\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('new_bike');

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
        $this->validate($request,['name'=>'required','price'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required','image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        $product=new Bike;
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
        return redirect('newbike')->with('success','Bike Posted successfully');
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

    public function sameType(Request $request, $bikeitem)
    {
        //$phonetype=$phoneitem->name;
        $biketype=$request->bikeitem;
       // dump('$phonetype');
        $matchingbikes= DB::table('bikes')->where('name', 'like', '%'.$biketype.'%')->get();
       return view('similarbikes')->with('matchingbikes',$matchingbikes);

    }

   public function  reqBike($bid, $bname)
   {
       $reqbikeid = $bid;
       $reqbikename = $bname;
       $biketype = "Bike";

       return view('bikereqdetails')->with('reqbikeid',$reqbikeid)->with('reqbikename',$reqbikename)->with('biketype',$biketype);
   }

   public function reqBikeStore(Request $request)
   {
     $this->validate($request,['fname'=>'required','sname'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required']);

      $reqBikeType = session()->get('bikeType');
      $bikeId = session()->get('reqBikeId');
      $bikeName = session()->get('reqBikeName');

      //Getting Phone Seller Infor
      //$reqProdSeller = session()->get('reqPhoneSeller');
      //$reqProdPrice = session()->get('reqPhonePrice');

      $bikeSeller = DB::table('bikes')->where('id','like','%'.  $bikeId.'%')->get();
      foreach($bikeSeller as $seller)
      {
        $bsellerphone = $seller->seller_phone;
        $bsellermail = $seller->seller_email;
       // $reqPhoneName = $seller->name;

      }
     // global $sellerphone;
     // global $sellermail;
   
       //$sellerphon = $sellerphone;
       //$selleremail = $sellermail;

        $prodrequest = new ProductRequest;

        $prodrequest->product_type = $reqBikeType;
        $prodrequest->product_name = $bikeName;
        $prodrequest->req_fname = $request->input('fname');
        $prodrequest->req_sname = $request->input('sname');
        $prodrequest->req_phone = $request->input('phone');
        $prodrequest->req_email = $request->input('email');
        $prodrequest->county = $request->input('county');
        $prodrequest->subcounty = $request->input('subcounty');
        $prodrequest->division = $request->input('division');
        $prodrequest->location = $request->input('location');
        $prodrequest->seller_phone =  $bsellerphone;
        $prodrequest->seller_email = $bsellermail;
         

        $prodrequest->save();
        return redirect('/Homeretrieve')->with("requestPlaced","Bike Request was placed successfully. PATA is for you.");

   }

public function allBikes()
{
 $approvedBikes = Bike::all()->toArray();

 return view('approvedbikes', compact('approvedBikes',$approvedBikes));
}

public function changeStatus($status)
{
$bikeid = $status;
$inStore = "In store";
$outStore = "Out Store";
//$targetbike = Bike::where('id', 'like', '%'.$bikeid.'%')->get();
$targetbike = Bike::find($bikeid);

if($targetbike)
{
    if($targetbike->status == $outStore)
    {
        $targetbike->status = $inStore;
        $targetbike->save();
    }
    elseif($targetbike->status == $inStore)
    {
        $targetbike->status = $outStore;
        $targetbike->save();
    }
    else
    {
       $targetbike->status = $outStore;
       $targetbike->save();
    }

}
return redirect('/handleBikes');

}


public function deleteBike($deletebikeid)
{
    Bike::where('id',$deletebikeid)->delete();
    return redirect('/handleBikes');
}

}
