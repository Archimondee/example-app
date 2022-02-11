<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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
// Route::get('/about', function () {
//     return "I am on about";
// });
// Route::get('/contact', function () {
//     return "I am on contact";
// });
// Route::get('/post/{id}', function ($id) {
//     return "This is a post number " . $id;
// });
// Route::get('admin/posts/example', array('as' => 'admin.home', function () {
//     $url = route('admin.home');

//     return "This url is " . $url;
// }));

//Route::get('/post/{id}', [PostsController::class, 'index']);
Route::resource('posts', 'PostsController');
