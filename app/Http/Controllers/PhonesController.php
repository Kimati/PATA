<?php

namespace App\Http\Controllers;
use App\Phone;
use App\ProductRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("new_phone");
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
        $this->validate($request,['name'=>'required','OS'=>'required','price'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required','image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        $product=new Phone;
        $product->name=$request->input('name');
        $product->OS=$request->input('OS');
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
        return redirect('newphone')->with('success','Phone Posted successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

//Form that captures the phone requester information
    public function reqPhone($pid,$pname)
    {
        $reqphone = $pid;
        $reqphonename = $pname;
       // $reqphoneprice = $pprice;
        //$reqphoneseller = $pseller;
        $prodtype = "Phone";
        return view('phonereqdetails')->with('reqphone',$reqphone)->with('reqphonename', $reqphonename)->with('prodtype',$prodtype);//->with('reqphoneseller',$reqphoneseller);
    }

//Storing the phone request Details.
    public function reqPhoneStore(Request $request)
    {
      $this->validate($request,['fname'=>'required','sname'=>'required','phone'=>'required|min:10|max:10','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required']);

      $reqProdType = session()->get('prodType');
      $reqPhoneId = session()->get('reqPhone');
      $phonName = session()->get('reqPhonName');

      //Getting Phone Seller Infor
      //$reqProdSeller = session()->get('reqPhoneSeller');
      //$reqProdPrice = session()->get('reqPhonePrice');

      $searchSeller = DB::table('phones')->where('id','like','%'. $reqPhoneId.'%')->get();
      foreach($searchSeller as $seller)
      {
        $sellerphone = $seller->seller_phone;
        $sellermail = $seller->seller_email;
       // $reqPhoneName = $seller->name;

      }
     // global $sellerphone;
     // global $sellermail;
   
       //$sellerphon = $sellerphone;
       //$selleremail = $sellermail;

        $prodrequest = new ProductRequest;

        $prodrequest->product_type = $reqProdType;
        $prodrequest->product_name = $phonName;
        $prodrequest->req_fname = $request->input('fname');
        $prodrequest->req_sname = $request->input('sname');
        $prodrequest->req_phone = $request->input('phone');
        $prodrequest->req_email = $request->input('email');
        $prodrequest->county = $request->input('county');
        $prodrequest->subcounty = $request->input('subcounty');
        $prodrequest->division = $request->input('division');
        $prodrequest->location = $request->input('location');
        $prodrequest->seller_phone =  $sellerphone;
        $prodrequest->seller_email = $sellermail;
         

        $prodrequest->save();
        return redirect('/Homeretrieve')->with("requestPlaced","Phone Request was placed successfully. PATA is for you.");



    }


//Handling phones by admin

    public function allPhones()
    {
        $approvedPhones = Phone::all()->toArray();
        return view('approvedphones',compact('approvedPhones', $approvedPhones));
    }


    //Change Phone Status
public function changeStatus($status)
{
$phoneid = $status;
$inStore = "In store";
$outStore = "Out Store";
//$targetbike = Bike::where('id', 'like', '%'.$bikeid.'%')->get();
$targetphone = Phone::find($phoneid);

if($targetphone)
{
    if($targetphone->status == $outStore)
    {
        $targetphone->status = $inStore;
        $targetphone->save();
    }
    elseif($targetphone->status == $inStore)
    {
        $targetphone->status = $outStore;
        $targetphone->save();
    }
    else
    {
       $targetphone->status = $outStore;
       $targetphone->save();
    }

}
return redirect('/handlePhones');

}

public function deletePhone($deletephoneid)
{
    Phone::where('id',$deletephoneid)->delete();
    return redirect('/handlePhones');
}
}
