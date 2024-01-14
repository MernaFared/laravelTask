<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ExploreItemController;
use App\Http\Controllers\ContcatUsController;

use App\Models\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    return " Welcome to my first route";
});

Route::get('user/{name}/{age?}', function ($name, $age = null) {
    if ($age !== null) {
        return "The UserName is : " . $name . "<br> and age is: </br>" . $age;
    } else {
        return "The UserName is : " . $name;
    }
})->whereIn('name',['perla','merna']);
Route::prefix('products')->group(function(){
    Route::get('/',function(){
    return 'products page';
    });
    Route::get('laptop',function(){
    return 'laptop product page';
    });
    Route::get('camera',function(){
    return 'camera product page';
    });
});
// About
Route::get('/about', function () {
    return 'About Us';
});
// Contact Us
Route::get('/contact-us', function () {
    return 'Contact Us';
});
// Support
Route::prefix('support')->group(function () {
    // Chat
    Route::get('/chat', function () {
        return 'Chat Support';
    });

    // Call
    Route::get('/call', function () {
        return 'Call Support';
    });

    // Ticket
    Route::get('/ticket', function () {
        return 'Ticket Support';
    });
});
// Training
Route::prefix('training')->group(function () {
    // HR
    Route::get('/hr', function () {
        return 'HR Training';
    });

    // ICT
    Route::get('/ict', function () {
        return 'ICT Training';
    });

    // Marketing
    Route::get('/marketing', function () {
        return 'Marketing Training';
    });

    // Logistics
    Route::get('/logistics', function () {
        return 'Logistics Training';
    });
});

// Route :: fallback(function(){
//     return redirect('/');
// });

Route::get('cv', function () {
    return  view('cv');
});

Route::get('login', function () {
    return  view('login');
});

// Route::get('place', function () {
//     return  view('place');
// });



// Route::post('receive', function () {
//     return  "data received";
// }) ->name('receive');

Route::get('test1',[ExampleController::class,'test1']);

Route::get('blog',[ExampleController::class,'blog']);
Route::get('blog1',[ExampleController::class,'blog1']);

Route::get('/session',[ExampleController::class,'mySession']);


// add car

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    

    Route::get('addCar', [CarController::class, 'storeCarData']);
    Route::get('AddCar', [CarController::class, 'create']);
    
});

Route::post('receive', [CarController::class, 'store'])->name('receive');
Route::get('showcars', [CarController::class, 'index'])->middleware('verified');

//edit car form 
Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar'); 

// show CarDetails
Route::get('carDetails/{id}', [CarController::class, 'show']);
 // Delete car
Route::get('deleteCar/{id}', [CarController::class, 'destroy']); 
// display deleted data car
Route ::get('trashedCar',[CarController::class,'trashed']);

// display deleted data car
Route ::get('restoreCar/{id}',[CarController::class,'restore']);
 // force Delete car
 Route::get('delete/{id}', [CarController::class, 'delete']); 

// show upload Car-image
Route::get('showUploadCar',[CarController::class,'showUpload']);

Route::post('uploadCar', [CarController::class, 'upload'])->name('upload');   



 //////////////////////////////////////// News ///////////////////////////////////////////////


// add news
Route::get('newsForm', [NewsController::class, 'create']); //route for form of news
Route::post('addNews', [NewsController::class, 'store'])->name('addNews');   
 
// route of displaying news data
Route::get('showNews',[NewsController::class, 'index']);

// edit and update news
Route::get('editNews/{id}', [NewsController::class, 'edit']);
Route::put('updateNews/{id}', [NewsController::class, 'update'])->name('updateNews'); 

// delete news
Route::get('deleteNews/{id}', [NewsController::class, 'destroy']); 

// show newsDetails
Route::get('newsDetails/{id}', [NewsController::class, 'show']);
 
 // Delete car
 Route::get('deleteNews/{id}', [NewsController::class, 'destroy']);

// display deleted news_data
Route ::get('trashedNews',[NewsController::class,'trashed']);

// restore deleted news_data
Route ::get('restoreNews/{id}',[NewsController::class,'restore']);


// force Delete news
  Route::get('deleteForceNews/{id}', [NewsController::class, 'delete']); 

// show upload News-image
  Route::get('showUploadNews',[CarController::class,'showUploadNews']) ;

Route::post('uploadNews', [NewsController::class, 'upload'])->name('upload');   
 

//Route::get('/explore', [ExploreItemController::class, 'index']);
Route::get('/createPlaces', [ExploreItemController::class, 'create']);
Route::post('/explore', [ExploreItemController::class, 'store']);
Route::get('/place', [ExploreItemController::class, 'index']); // show dataof places
 
Route::get('showPlace/{id}', [ExploreItemController::class, 'show'])->name('showPlace');
Route::get('deletePlace/{id}', [ExploreItemController::class, 'destroy'])->name('deletePlace');
Route::get('trashedPlaces', [ExploreItemController::class, 'getTrashed']);
Route::get('restorePlace/{id}', [ExploreItemController::class, 'restore'])->name('restorePlace');
Route::get('deleteForce-place/{id}', [ExploreItemController::class, 'deleteforce'])->name('deleteforce');;
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 

 
Route::get('/contact', [ContcatUsController::class, 'create']);

Route::post('/send',[ContcatUsController::class, 'sendEmail'])->name('SendEmail');

// Example route in web.php
Route::group(['middleware' => 'auth.car'], function () {
    Route::get('cars/create', 'CarController@create');
    Route::post('cars', 'CarController@store');
    Route::get('cars/{id}/edit', 'CarController@edit');
    Route::put('cars/{id}', 'CarController@update');
    Route::delete('cars/{id}', 'CarController@destroy');
});
