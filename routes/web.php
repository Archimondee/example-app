<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\DB;
use App\Post;

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
// Route::resource('posts', 'PostsController');

// Route::get('/contact', [PostsController::class, 'contact']);
// Route::get('post/{id}/{name}/{password}', [PostsController::class, 'show_post']);


//SQL Raw
// Route::get('/insert', function () {
//     DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is good']);
// });
// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id = ?',[1]);

//     // foreach ($results as $post) {
//     //     return $post->title;
//     // }

//     return $results;
// });
// Route::get('/update', function(){
//     $updated = DB::update('update posts set title="Update title" where id = ? ',[1]);

//     return $updated;
// });
// Route::get('/delete', function(){
//     $deleted = DB::delete('delete from posts where id = ? ', [1]);

//     return $deleted;
// });


//SQL Eloquent ORM
// Route::get('/find', function () {
//     $posts = Post::find(3);
//     return $posts->title;
//     // foreach ($posts as $post) {
//     //     return $post->title;
//     // }
// });
// Route::get('/findwhere', function () {
//     $post = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

//     foreach ($post as $p) {
//         return $p->title;
//     }
//     //return $post;
// });
// Route::get('/findmore', function () {
//     //$posts = Post::findOrFail(1);

//     $posts = Post::where('user_count', '<', 50)->firstOrFail();
//     return $posts;
// });

// Route::get('/basicinsert', function () {
//     $post = new Post;

//     $post->title = 'New ORM title';
//     $post->content = 'Content Eloquent ORM';
//     $post->save();
// });
// Route::get('/basicupdate', function(){
//     $post = Post::find(4);
//     $post->title = 'New ORM title 1';
//     $post->content = 'Content Eloquent ORM 1';
//     $post->save();
// });
Route::get('/create', function () {
    Post::create(['title' => 'The create method', 'content' => 'Wow Eloquent ORM']);
});
Route::get('/update', function () {
    Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New PHP Title', 'content' => 'I like eloquent']);
});
Route::get('/delete', function () {
    $post = Post::find(2);
    $post->delete();
});
Route::get('/delete1', function () {
    Post::destroy([4, 5]);
    //Post::where('is_admin', 0)->delete();
});

Route::get('/softdelete', function () {
    $post = Post::find(6);
    $post->delete();
});
Route::get('/readsoftdelete', function () {
    $post = Post::onlyTrashed()->where('id', 6)->get();
    return $post;
});
Route::get('/restore', function(){
    Post::withTrashed()->where('is_admin', 0)->restore();
});
Route::get('/forcedelete', function(){
    Post::withTrashed()->where('id', 6)->forceDelete();
});
