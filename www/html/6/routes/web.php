<?php

    use App\Http\Controllers\AddController;
    use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('hello', function () {
    return '<html><body><h1>Hello World</h1></body></html>';
});

Route::get('add', [AddController::class, 'index']);

// Laravel8では使えない https://readouble.com/laravel/8.x/ja/controllers.html
// Route::get('add', function () {
//     return 'AddController@index';
// });
