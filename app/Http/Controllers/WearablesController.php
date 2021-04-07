<?php

namespace App\Http\Controllers;
use App\Wearable;
use App\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WearablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("new_wearable");
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
        $patawearable=new Wearable;
        $patawearable->name=$request->input('name');
        $patawearable->price=$request->input('price');
        $patawearable->seller_phone=$request->input('phone');
        $patawearable->seller_email=$request->input('email');
        $patawearable->county=$request->input('county');
        $patawearable->subcounty=$request->input('subcounty');
        $patawearable->division=$request->input('division');
        $patawearable->location=$request->input('location');
        $image= $request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("uploadedimages"),$new_name);
        $patawearable->image=$new_name;

        $patawearable->save();
        return redirect('newwearable')->with('success','Wearable Posted successfully');
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

    public function sameType(Request $request, $wearableitem)
    {
        //$phonetype=$phoneitem->name;
        $wearabletype=$request->wearableitem;
       // dump('$phonetype');
        $matchingwearables= DB::table('wearables')->where('name', 'like', '%'.$wearabletype.'%')->get();
       return view('similarwearables')->with('matchingwearables',$matchingwearables);

    }

    public function reqWearable($wid, $wname)
    {
        $reqwid = $wid;
        $reqwname = $wname;
        $wtype = "Wearable";

        return view('wearablereqdetails')->with('reqwid',$reqwid)->with('reqwname', $reqwname)->with('wtype',$wtype);
    }

    public function reqWearableStore(Request $request)
    {
      $this->validate($request,['fname'=>'required','sname'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required']);

      $reqWearableType = session()->get('wearableType');
      $wearableId = session()->get('reqWearableId');
      $wearableName = session()->get('reqWearableName');

      //Getting Phone Seller Infor
      //$reqProdSeller = session()->get('reqPhoneSeller');
      //$reqProdPrice = session()->get('reqPhonePrice');

      $wearableSeller = DB::table('wearables')->where('id','like','%'.  $wearableId.'%')->get();
      foreach($wearableSeller as $seller)
      {
        $wsellerphone = $seller->seller_phone;
        $wsellermail = $seller->seller_email;
       // $reqPhoneName = $seller->name;

      }
     // global $sellerphone;
     // global $sellermail;
   
       //$sellerphon = $sellerphone;
       //$selleremail = $sellermail;

        $prodrequest = new ProductRequest;

        $prodrequest->product_type = $reqWearableType;
        $prodrequest->product_name = $wearableName;
        $prodrequest->req_fname = $request->input('fname');
        $prodrequest->req_sname = $request->input('sname');
        $prodrequest->req_phone = $request->input('phone');
        $prodrequest->req_email = $request->input('email');
        $prodrequest->county = $request->input('county');
        $prodrequest->subcounty = $request->input('subcounty');
        $prodrequest->division = $request->input('division');
        $prodrequest->location = $request->input('location');
        $prodrequest->seller_phone =  $wsellerphone;
        $prodrequest->seller_email = $wsellermail;
         

        $prodrequest->save();
        return redirect('/Homeretrieve')->with("requestPlaced","Wearable Request was placed successfully. PATA is for you.");


    }

    //Handling Wearables by admin

    public function allWearables()
    {
        $approvedWearables = Wearable::all()->toArray();
        return view('approvedwearables',compact('approvedWearables', $approvedWearables));
    }


    //Change Phone Status
public function changeStatus($status)
{
$wearableid = $status;
$inStore = "In store";
$outStore = "Out Store";
//$targetbike = Bike::where('id', 'like', '%'.$bikeid.'%')->get();
$targetwearable = Wearable::find($wearableid);

if($targetwearable)
{
    if($targetwearable->status == $outStore)
    {
        $targetwearable->status = $inStore;
        $targetwearable->save();
    }
    elseif($targetwearable->status == $inStore)
    {
        $targetwearable->status = $outStore;
        $targetwearable->save();
    }
    else
    {
       $targetwearable->status = $outStore;
       $targetwearable->save();
    }

}
return redirect('/handleWearables');

}

public function deleteWearable($deletewearableid)
{
    Wearable::where('id',$deletewearableid)->delete();
    return redirect('/handleWearables');
}

}
