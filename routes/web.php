<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\all;

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

//Root Of App
Route::get('/', function(){
    return view('welcome');
});

//Custom Response Header
Route::get('user', function(){
    $response = response('user',200);
    $response->headers->set('Coustom_Key', '309');
    $response->setTtl(60);
    return $response;

});

//Response JSON
Route::get('/Response/Json', function(){
    $data = ['Apple', 'Ball', 'Cat'];
    return response()->json($data);
});

//Download Response
Route::get('/Response/Download', function(){
    $file = public_path('files/file_download.txt');
    return response()->download($file, 'custom_name.txt');
});

// Route Parameters
Route::get('/Buildings', function(){
    return "Select The Buildings";
});

Route::get('/Buildings/{name?}', function($name = null){
    $data['name'] = $name;
    return view('Buildings.' . $name, $data);

});

//Data Retrival (Request Data)

Route::get('User/Info', function(){
    return view('User.Info');
});


Route::get('/User/Infoo', function(){
    $data = request()->all();
    var_dump($data);

});
//Retriving Data from old request
Route::get('/User/Infoo', function(){

    return redirect()->to('new/request')->withInput(request()->except('_token'));
});

Route::get('new/request', function(){
    var_dump(request()->old());
});

//Upload and Retrive File

Route::get('/User/upload', function(){
    return view('User.upload');
});

Route::post('/upload-file', function(){
    $name = request()->file('book')->getClientOriginalName();
    request()->file('book')->move(storage_path('/directory'), $name);
    return request()->file('book')->getMaxFilesize();
});

//Cookie Test

Route::get('/cf', function(){

    return \redirect("User/cookie_test")->withCookie(Cookie::make('Id','123',30));
});

Route::get('User/cookie_test', function (){
   return view('User/cookie_test');
});

//Advanced Routing -- Named Routes

Route::get('/universe/galaxy/stars/planets', [
    'as' => 'planets', function() {
    return view('welcome');
    }
]);

//Routing to Named routes
Route::get('/yes', function(){

    return \redirect()->route('planets');
});

Route::get('/test', function (){
    return response("Nom nom");
});





