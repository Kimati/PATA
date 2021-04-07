<?php

use Illuminate\Support\Facades\Route;
//use App\Mail\NewMember;
//use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/Homeretrieve', function () {
  //  return view('PATA');
//});

Route::view('/', 'PATA');

Route::view('/Homeretrieve', 'PATA');

/*Route::get('/welcome', function(){

    Mail::to('kadon@gmail.com')->send(new NewMember);
    return new NewMember();

});
*/
/*Route::get('/reg', function () {
    return view('auth/register');
});
*/

Route::view('/reg', 'auth/register');


Route::get('/login', function () {
    return view('auth/login');
});

Route::post('/Register','Auth\RegisterController@newCustomer')->name('reg');

/*Route::get('/products', function () {
    return view('pata_products');
});
*/

Route::view('/products', 'pata_products');

/*Route::get('/admpanel', function () {
    return view('admdashboard');
});
*/

Route::view('/admpanel', 'admdashboard');
//Route::resource('admn_upload_bike','AdminBikeController');
Route::get('/pata',['uses'=>'HomeController@index']);
Route::resource('newproduct','NewProductUploadController');
Route::post('/newproduct_store',['uses'=>'NewProductUploadController@store']);
Route::resource('newbike','BikeController');
Route::post('/newbike_store',['uses'=>'BikeController@store']);
Route::resource('newphone','PhonesController');
Route::post('/newphone_store',['uses'=>'PhonesController@store']);
Route::resource('newwearable','WearablesController');
Route::post('/newwearable_store',['uses'=>'WearablesController@store']);
Route::resource('newmachine','MachinesController');
Route::post('/newmachine_store',['uses'=>'MachinesController@store']);
Route::resource('newasset','AssetsController');
Route::post('/newasset_store',['uses'=>'AssetsController@store']);
Route::resource('Homeretrieve','HomeController');
//Route::resource('placeToCart/{id}',['uses'=>'CartController', 'as'=>'addToCart']);
//Route::get('placeToCart/{id}',['uses'=>'AddToCartController@addItem', 'as'=>'addToCart']);
Route::get('placeToCart/{product}',['uses'=>'AddToCartController@addItem', 'as'=>'addToCart']);
Route::get('placeWearableToCart/{mywearable}',['uses'=>'AddToCartController@addWearable', 'as'=>'addWearableToCart']);
Route::get('placeBikeToCart/{mybike}',['uses'=>'AddToCartController@addBike', 'as'=>'addBikeToCart']);
Route::get('placeMachineToCart/{mymachine}',['uses'=>'AddToCartController@addMachine', 'as'=>'addMachineToCart']);
Route::get('showcart',["uses"=>"AddToCartController@showCart","as"=>"displayCart"]);
Route::get('deleteCartItem/{cartItem}',['uses'=>'CartController@deleteItem', "as"=> "deleteCartItem"]);
Route::resource('/enquiry',"userRequestController");
Route::get('/messages_store',["uses"=>"userRequestController@store"]);
Route::get('/send-email','MailSend@mailsend');

/*Route::get('/sell', function () {
    return view('sell-on-PATA');
});
*/
Route::view('/sell','sell-on-PATA');

Route::get('/allphones',['uses'=>'AllRetrievesController@phones']);
Route::get('/allwearables',['uses'=>'AllRetrievesController@wearables']);
Route::get('/allbikes',['uses'=>'AllRetrievesController@bikes']);
Route::get('/allmachines',['uses'=>'AllRetrievesController@machines']);
Route::resource('orderhandler', 'OrderHandlerController');

Route::get('/choose-checkout-method', ['uses'=>'OrderHandlerController@checkoutMethod']);
Route::get('/guestOrderDetails/prompt', ['uses'=>'OrderHandlerController@guestDetailsPrompt']);
Route::post('/guestOrderDetails', ['uses'=>'OrderHandlerController@guestOrderDetails']);
Route::get('/choose-pickup-county',['uses'=>'OrderHandlerController@choosecounty', 'as'=>'mycounty']);
Route::post('/choose-pickup-station',['uses'=>'OrderHandlerController@pickupstation', 'as'=>'pickupstation']);
Route::post('/complete-your-order',['uses'=>'OrderHandlerController@ordersummary', 'as'=>'ordersummary']);
Route::get('/confirmOrder/{sname}/{scost}',['uses'=>'OrderHandlerController@confirmOrder','as'=>'çonfirmOrder']);
Route::get('/rUserConfirmOrder/{rsname}/{rscost}',['uses'=>'OrderHandlerController@rUserConfirmOrder', 'as'=>'rUserConfirmOrder']);
Route::get('/payOrder',['uses'=>'OrderHandlerController@payOrder']);
Route::get('/rpayOrder',['uses'=>'OrderHandlerController@rPayOrder']);
Route::get('/saveorder',['uses'=>'OrderHandlerController@saveOrder']);
Route::get('/rsaveorder',['uses'=>'OrderHandlerController@rSaveOrder']);
Route::post('/order_store', 'OrderHandlerController@store');
Route::get('/ordersummary', 'OrderHandlerController@ordersummary');
Route::get('/choose-pickup-station/{pickupcounty}', 'OrderHandlerController@pickUpStation');
Route::post('/ruser-pick-station','OrderHandlerController@ruserpickupstation')->name('ruserpickupstation');


//Route::get('/phone-same-type/{phoneitem}',['uses'=>'NewProductUploadController@sametype', 'as'=>'phonesametype']);
Route::get('/phone-same-type/{phoneitem}', ['uses'=>'NewProductUploadController@sameType', 'as'=>'phonesametype']);
Route::get('/werable-same-type/{wearableitem}', ['uses'=>'WearablesController@sameType', 'as'=>'wearablesametype']);
Route::get('/bike-same-type/{bikeitem}', ['uses'=>'BikeController@sameType', 'as'=>'bikesametype']);
Route::get('/machine-same-type/{machineitem}', ['uses'=>'MachinesController@sameType', 'as'=>'machinesametype']);

//Routes that handle the packge add To cart functionality
Route::get('placeToCart/{product}',['uses'=>'pAddToCartController@addPhone', 'as'=>'paddToCart']);//->middleware('auth');
Route::get('placeWearableToCart/{mywearable}',['uses'=>'pAddToCartController@addWearable', 'as'=>'paddWearableToCart']);//->middleware('auth');
Route::get('placeBikeToCart/{mybike}',['uses'=>'pAddToCartController@addBike', 'as'=>'paddBikeToCart']);//->middleware('auth');
Route::get('placeMachineToCart/{mymachine}',['uses'=>'pAddToCartController@addMachine', 'as'=>'paddMachineToCart']);//->middleware('auth');
Route::get('pshowcart',["uses"=>"pAddToCartController@showcart","as"=>"pdisplayCart"]);
Route::get('deleteCartItem/{cartItem}',['uses'=>'pAddToCartController@deleteItem', "as"=> "pdeleteCartItem"]);
Route::get('updateItemPrice/{itemPrice}',['uses'=>'pAddToCartController@updatePrice', "as"=> "update.price"]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/regCustLogin', 'OrderHandlerController@registeredCustomers')->name('registerdcust')->middleware('auth');

//Routes to handle the Products Requests incase of Out store products.
Route::get('/Request-Phone/{pid}/{pname}', ['uses'=>'PhonesController@reqPhone', 'as'=>'requestPhone']);
Route::post('/phonereq_store', ['uses'=>'PhonesController@reqPhoneStore', 'as'=>'requestPhoneStore']);

Route::get('/Request-Wearable/{wid}/{wname}', ['uses'=>'WearablesController@reqWearable', 'as'=>'requestWearable']);
Route::post('/wearablereq_store', ['uses'=>'WearablesController@reqWearableStore', 'as'=>'requestWearableStore']);

Route::get('/Request-Bike/{bid}/{bname}', ['uses'=>'BikeController@reqBike', 'as'=>'requestBike']);
Route::post('/bikereq_store', ['uses'=>'BikeController@reqBikeStore', 'as'=>'requestBikeStore']);


Route::get('/Request-Machine/{mid}/{mname}', ['uses'=>'MachinesController@reqMachine', 'as'=>'requestMachine']);
Route::post('/machinereq_store', ['uses'=>'MachinesController@reqMachineStore', 'as'=>'requestMachineStore']);

//Admin routes to handle Bikes
Route::get('/handleBikes', ['uses'=>'BikeController@allBikes', 'as'=>'handleBikes']);
Route::get('/bike-status/{status}', ['uses' => 'BikeController@changeStatus', 'as'=>'changebikestatus']);
Route::get('/bike-delete/{deletebikeid}',['uses'=>'BikeController@deleteBike', 'as'=>'deletebike']);

//Admin routes to handle Phones
Route::get('/handlePhones', ['uses'=>'PhonesController@allPhones', 'as'=>'handlePhones']);
Route::get('/phone-status/{status}', ['uses' => 'PhonesController@changeStatus', 'as'=>'changephonestatus']);
Route::get('/phone-delete/{deletephoneid}',['uses'=>'PhonesController@deletePhone', 'as'=>'deletephone']);

//Admin routes to handle Wearables
Route::get('/handleWearables', ['uses'=>'WearablesController@allWearables', 'as'=>'handleWearables']);
Route::get('/wearable-status/{status}', ['uses' => 'WearablesController@changeStatus', 'as'=>'changewearablestatus']);
Route::get('/wearable-delete/{deletewearableid}',['uses'=>'WearablesController@deleteWearable', 'as'=>'deletewearable']);

//Admin routes to handle Machines
Route::get('/handleMachines', ['uses'=>'MachinesController@allMachines', 'as'=>'handleMachines']);
Route::get('/machine-status/{status}', ['uses' => 'MachinesController@changeStatus', 'as'=>'changemachinestatus']);
Route::get('/machine-delete/{deletemachineid}',['uses'=>'MachinesController@deleteMachine', 'as'=>'deletemachine']);

Route::get('/arrangeTable',['uses'=>'AdminUploadController@arrangeTable']);
Route::post('/arrange-Rows',['uses'=>'AdminUploadController@arrangeRows']);