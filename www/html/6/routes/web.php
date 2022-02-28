<?php

    use App\Http\Controllers\AddController;
    use App\Http\Controllers\TestController;
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

// 6-2
Route::get('hello', function () {
    return '<html><body><h1>Hello World</h1></body></html>';
});

// 6-3
Route::get('add', [AddController::class, 'index']);

// 6-4
Route::get('test', [TestController::class, 'index']);
// Laravel8では使えない https://readouble.com/laravel/8.x/ja/controllers.html
// Route::get('add', function () {
//     return 'AddController@index';
// });
