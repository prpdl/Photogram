<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use Illuminate\Database\Eloquent\Model;


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
/*
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

Route::get('/ok', function(){
    $cookie = Cookie::make('Location', 'Sydney', 30);
    return \redirect("User/cookie_test")->withCookie($cookie);
});

Route::get('User/cookie_test', function (){
   return view('User/cookie_test');
});

//Advanced Routing -- Named Routes

Route::get('/universe/galaxy/stars/planets', [
    'as' => 'planets', function() {
    return response(Route::currentRouteName());
    }
]);

//Routing to Named routes
Route::get('/yes', function(){

    return Redirect::route('planets');
});
//Parameter in the routes
Route::get('/kill/{name}', function ($name){
   return "{$name} couldnot be killed";
})->where('name', '[A-Za-z]+');

//AR- Route Groups and Prefixing

Route::group(['prefix' => 'movies'], function(){

    Route::get('/ironman', function (){
        return "Iron man in the suite";
    }) ;

    Route::get('/superman', function (){
        return "Superman in the space";
    }) ;

    Route::get('/spiderman', function (){
        return "Spiderman in the web";
    }) ;


});

//Domain Routing [Need to learn how to configure specific sub-domains]

Route::group(['domain' => 'localhost'], function (){
   Route::get('profile/{page}', function ($page){
       return " - > Page Name: $page";
   }) ;
});

*/

/*
//Controller Routing
Route::get('Article/index', 'ArticleController@index');

Route::get('single/{name}', 'ArticleController@single');

Route::post('Article/index', 'ArticleController@post');

Route::resource('laravelapp', 'UserController');

Route::resource('/', 'UserController');

Route::get('/foo/bar', 'UserController@single');

//URL

Route::get('/search/{search?}', function ($search){
    $data['search'] = $search;
    return Redirect::to('www.google.com')->withInput($data);
});

Route::get('/www.google.com/', function (){

  return Redirect::to(url()->to('www.bing.com', ['search'], true))->withInput( request()->old());
});

Route::get('/www.bing.com', function(){
   $search = request()->old();
   return "Question Searched on Bing: " . $search['search'];
});

//HTTP URL with array path extension

Route::get('http/url', function (){
   return redirect()->to(url()->secure('real/http/path', ['arrayvalue1', 'arrayvalue2']));
});

//URL to a named Routes

Route::get('planets/galaxies/universe' , ['as'=>'cosmos', function(){
    return "You are in the Universe";
}]);

Route::get('whereami', function (){
   return url()->route('cosmos');
});

//URL to a named route with parameter

Route::get('user/{name}/service/{serviceid}', ['as'=>'userService', function ($name, $serviceid ){
        return "Name: {$name} ServiceID: {$serviceid}";
    }]);

Route::get('/user/{name}/{userId}', function ($name, $userId){
   return url()->route('userService', [$name, $userId]);
});

Route::get('post/{post}', function ($post){
   return "Postid: $post";
})->name('post');

Route::get('gotopost', function (){
   return url()->route('post' , ['post'=>'12']);
});

//url->action (Controller)
Route::get('article/{by}/{value}', 'ArticleController@delete');

Route::get('deletpradip', function (){
   return \redirect(url()->action('ArticleController@delete', ['name',
       'pradip']));
});

//Asset URL

Route::get('profile/picture', function (){
    return redirect(url()->asset('img/pic.jpg', true));
});

*/


//Databases

//Creating Tables

/**

 Route::get('buildadminschema', function () {
    Schema::table('admins', function ($table) {
        $table->increments('id');
        $table->string('username', 32);
        $table->string('email', 320);
        $table->string('password', 60);
        $table->primary('username', 'email');
        $table->timestamps();
    });
});

Route::get('buildManagers', function () {
    Schema::create('managers', function ($table) {
        $table->string('branch')->unique();
        $table->increments('id');
        $table->double('salary');

    });
});
//Rename Teble

Route::get('updateMangers', function () {
    Schema::rename('managers', 'directors');
});

//Update table contents
Route::get('updateemail', function () {
    Schema::table('managers', function ($table) {
        $table->string('email')->nullable(true);

    });
});

Route::get('updateaddress', function () {
    Schema::table('managers', function ($table) {
        $table->string('address')->default('Sydeny');
    });
});

//Drop Column

Route::get('renameid', function () {
    Schema::table('managers', function ($table) {
        $table->renameColumn('id', 'managerid');
    });
});

//Remove Primary Keys

Route::get('removePri', function () {
    Schema::table('houses', function ($table) {

        $table->dropPrimary('address');
    });
});

Route::get('/makebrnachpri', function () {
    Schema::table('managers', function ($table) {
        $table->primary('branch');
    });
});

Route::get('changehouse', function () {
    Schema::table('houses', function ($table) {
        $table->primary(['houseid', 'address']);
        $table->string('occupent', 50)->nullable(true)->change();

    });
});

Route::get('dropall', function () {
    Schema::dropIfExists('houses');
    Schema::dropIfExists('managers');
    Schema::dropIfExists('directors');
    Schema::dropIfExists('admins');
});

Route::get('makeoccupent', function () {
    if (Schema::hasTable('houses')) {
        Schema::create('occupent', function ($table) {
            $table->increments('occupentid');
            $table->string('name', true);
            $table->string('dependents')->nullable();
        });
    }
});


/* Manual Database Seeding */
/*

Route::get('/addalbums', function () {
    $album = new \App\Album();
    $album->title = 'The Wall';

    $album->gerne = 'Psychedelic';
    $album->year = 1974;
    $album->save();

    $album = new \App\Album();
    $album->title = 'LZ IV';

    $album->gerne = 'Hard Rock';
    $album->year = 1969;
    $album->save();

    $album = new \App\Album();
    $album->title = 'Catch a Fire';

    $album->gerne = 'Raggee';
    $album->year = 1973;
    $album->top100 = 'No';
    $album->save();

    $album = new \App\Album();
    $album->title = 'Strange Days';

    $album->gerne = 'Sex Rock';
    $album->year = 1971;
    $album->top100 = 'No';
    $album->save();

    $album = new \App\Album();
    $album->title = 'Back to Back';

    $album->gerne = 'Soule/Rhythm';
    $album->year = 2006;
    $album->top100 = 'No';
    $album->save();

    $album = new \App\Album();
    $album->title = 'Lucille';

    $album->gerne = 'Blues';
    $album->year = 1968;
    $album->top100 = 'Yes';
    $album->save();
});


Route::get('/album', function () {
    return \App\Album::whereRaw('id >= ? AND artist = ? AND title LIKE ?', ['4', 'Pink Floyd', 'T%'])
        ->orwhere('artist', 'like', 'L%')
        ->toSql();

});

Route::get('/allalbums', function () {
    return \App\Album::first();
});

Route::get('/deleteall', function () {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    \App\Album::truncate();
    DB::STATEMENT('SET FOREIGN_KEY_CHECKS=1;');
    return \App\Album::all();
});

Route::get('/select/{col}', function ($col) {
    return \App\Album::pluck($col);
});

Route::get('/year', function () {
    return \App\Album::whereBetween('year', array('year', 1970, 1974))
        ->get();
});

//Nested Where/orWhere with closure

Route::get('/yearbetween', function () {
    return \App\Album::whereNested(function ($query) {
        $query->where('year', '>=', 2000);
        $query->where('year', '<=', 2010);
    })
        ->orWhere(function ($query) {
            $query->where('year', '=', '1968');
        })->get();
});
//rawSql of ^^^ with custon input
Route::get('/rawwhere/{first} {second}', function ($first, $second) {
    return \App\Album::whereRaw('year >= ? and year <= ? or  year =1968', [
        $first, $second, 1968])
        ->get();
});

//WhereIn

Route::get('/whereIn/{column}/{value}', function ($col, $val) {
    $valuse = [$val];
    return \App\Album::whereIn($col, $valuse)
        ->get();
});

//whereNull/Not Null/oredrBy/asc/desc/take/

Route::get('/wherenull', function () {
    return \App\Album::whereNotNull('top100')
        ->take(4)  // limit the result
        ->skip(4)   //Skip the result, offset
        ->orderBy('year', 'desc')  //order by year, descending
        ->get();
});

//Magic Where query

Route::get('/magicWhere', function () {
    return App\Album::whereGerne('Hard Rock')
        ->get();
});


//Query Scope

Route::get('/searchby', function () {
    return App\Album::beginsWith()->get();  //Look at model - app/Album fro complete understanding.
});


//Elequont Collections

Route::get('/ecall', function () {
    $collection = \App\Album::all();


    var_export($collection->toJson());

});

//Filter

Route::get('/ecfilter', function () {
    $collection = \App\Album::all();
    $new = $collection->filter(function ($album) {
        if ($album->artist == 'B.B King') {
            return true;
        } else {
            return false;
        }
    });

    var_dump($new);
});

//Sort

Route::get('/ecsort', function () {
    $collection = \App\Album::all();
    $collection = $collection->sortByDesc('year');

    $collection->each(function ($album) {
        var_dump($album->year);
    });


});

//Reverse
Route::get('ecreverse', function () {
    $collection = App\Album::all();
    $collection->each(function ($album) {
        var_dump($album->artist);
    });
    echo "<br>";
    $collection = $collection->reverse();

    $collection->each(function ($album) {
        var_dump($album->artist);
    });

});

//Merge

Route::get('/ecmerge', function () {
    $collection1 = \App\Album::whereArtist('Pink Floyd')
        ->get();
    $collection2 = \App\Album::whereArtist('B.B King')
        ->get();

    $result = $collection1->merge($collection2);

    $result->each(function ($album) {
        var_dump($album->artist);
        echo "<br>";
    });
});

//Slice

Route::get('/ecslice', function () {
    $collection = \App\Album::all();

    $slicedCollection = $collection->slice(-4, 2);

    $slicedCollection->each(function ($album) {
        var_dump($album->artist);
        echo "<br>";
    });
});

//isEmpty
Route::get('/ecisempty', function () {
    $col1 = App\Album::all();
    $col2 = App\Album::whereTitle('Hudidid')
        ->get();
    var_dump($col1->isEmpty());
    var_dump($col2->isEmpty());
});


//Eloquent Relationship

Route::get('/album_artist_relation', function (){
    $artist = App\Artist();
    $artist->name = 'B.B King';
    $artist->save();

    $album =  App\Album::where('title', '=', 'Lucille')
    ->get();
    $album->artist()->associate($artist);
    $album->save();

    $listener = new \App\Listener();
    $listener->name = 'Ross';
    $listener->save();
    $listener->albums()->save($album);

    return view::make('welcome');

});

Route::get('/relationshipquery', function (){
   $album = \App\Album::whereNotNull('artist_id');
   var_dump($album);
});

*/
Auth::routes();
Route::get('/', function (){
    return \view('welcome');
});
/*

Route::get('/home', 'HomeController@index')->name('home');

Route::post('register', 'RegistrationController@register');
Route::resource('customRegistration', 'RegistrationController');

Route::resource('album', 'AlbumController')->middleware('test');

Route::get('bootstrap', function (){
   return \view('bootstrap');
});
*/
Route::resource('album', 'AlbumController');
Route::resource('channel', 'ChannelController')->middleware('auth');
Route::get('post/create', 'PostController@create');

