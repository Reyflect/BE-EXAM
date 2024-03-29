<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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


Route::get('/login',  function () {
    return view('login');
});

Route::post('/loginAuthentication', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard{any}', [UserController::class, 'goToDashboardPage'])->where('any', '.*');;

Route::get('/', [UserController::class, 'checkSession']);

Route::get('/api/products', [ProductController::class, 'index']);
Route::get('/api/products/search', [ProductController::class, 'search']);
Route::get('/api/products/{product}', [ProductController::class, 'getProductById']);

Route::post('/api/addnewproduct',  [ProductController::class, 'addNewProduct']);
Route::post('/api/updateproduct/{product}', [ProductController::class, 'updateProduct']);

Route::delete('/api/products/{product}', [ProductController::class, 'deleteProduct']);

Route::get('/getDistinctCategories', [ProductController::class, 'getDistinctCategories']);

Route::get(
    '/createproduct',
    function () {

        return view('/dashboard');
    }
);
Route::get(
    '/editproduct/{product}',
    [ProductController::class, 'showEditProduct']
);

Route::get(
    '/videos',
    function () {
        $videoName = request('video', 'hedgehog');
        return view('dashboard', ['video' => $videoName]);
    }
);
Route::get(
    '/error',
    function () {
        return view('/dashboard');
    }
);
