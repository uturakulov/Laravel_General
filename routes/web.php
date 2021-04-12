<?php

use App\Country;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Photo;
use App\Tag;
use Illuminate\Support\Carbon;

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


/*
|--------------------------------------------------------------------------
| Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function () {
//     DB::insert('insert into posts (title, content,created_at, updated_at, author) values (?, ?, ?, ?, ?)', ['second title', 'another content', now(), now(), 'ulube']);
// });

// Route::get('/read', function () {
//     $results = DB::select('select * from posts where id = ?', [1]);

//     foreach ($results as $result) {
//         // return $result->title;
//         return $result->content;
//     }
// });

// Route::get('/update', function () {
//     $update = DB::update('update posts set title = "crazy title, isnt it" where id = ?', [2]);
//     return $update;
// });

// Route::get('/delete', function () {
//     $delete = DB::delete('delete from posts where id = ?', [1]);
//     return $delete;
// });


// /*

// -------------------
// ELOQUENT ORM
// -------------------

// */

// /*

// -------------------
// READ Elo
// -------------------

// */

// Route::get('/find', function () {
//     $posts = Post::all();

//     foreach ($posts as $post) {
//         return $post->title;
//     }
// });

// Route::get('/findFunc', function () {

//     $posts = Post::find(2);

//     return $posts->content;

//     // foreach ($posts as $post) {
//     //     return $post->title;
//     // }
// });


// Route::get('/findwhere', function () {
//     $where = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

//     return $where;
// });


// /*

// -------------------
// INSERT Elo
// -------------------

// */

// Route::get('/insertElo', function () {
//     $post = new Post;
//     $post->title = 'new Eloq Title';
//     $post->content = 'new Eloq Content';
//     $post->created_at = now();
//     $post->updated_at = now();
//     $post->author = 'Again Ulube';
//     $post->save();
//     // return $post;
// });

// Route::get('/insertEloq', function () {
//     $post = Post::find(3);
//     $post->title = 'new Eloq Title 2';
//     $post->content = 'new Eloq Content 2';
//     // $post->created_at = now();
//     // $post->updated_at = now();
//     $post->author = 'Again Ulube';
//     $post->save();
//     // return $post;
// });


// /*

// -------------------
// Create Elo
// -------------------

// */

// Route::get('/createElo', function () {
//     Post::create(['title' => 'Another Title', 'content' => 'Some silly content', 'author' => 'uturakulov']);
// });



// /*

// -------------------
// Update Elo
// -------------------

// */

// Route::get('/updateElo', function () {
//     Post::where('id', 4)->where('author', 'Again Ulube')->update(['title' => 'Boldiyee', 'content' => 'zbbbbbb', 'author' => 'me']);
// });


// /*

// -------------------
// Delete Elo
// -------------------

// */


// Route::get('/deleteElo', function () {
//     $post = Post::find(4);
//     $post->delete();
// });

// Route::get('/deleteElo2', function () {
//     Post::destroy(5);
// });


// /*

// -------------------
// Soft Delete Elo
// -------------------

// */

// Route::get('/softDelete', function () {
//     Post::find(2)->delete();
// });

// //Reading deleted items
// Route::get('/readSoftDelete', function () {
//     $post = Post::withTrashed()->get();
//     return $post;
// });

// /*

// -------------------
// Restoring Elo
// -------------------

// */

// Route::get('/restore', function () {

//     Post::onlyTrashed()->restore();
// });

// /*

// -------------------
// Force Delete Elo
// -------------------

// */

// Route::get('/forceDelete', function () {
//     Post::onlyTrashed()->where('id', 2)->forceDelete();
// });


// /*

// ----------------------
// ELOQUENT Relationships
// ----------------------

// */

// //one to one rel
// Route::get('/user/{id}/post', function ($id) {
//     return User::find($id)->post->author;
// });

// //inverse
// Route::get('post/{id}/user', function ($id) {
//     return Post::find($id)->user->email;
// });

// //one to many rel
// Route::get('/posts/{id}', function ($id) {
//     $user = User::find($id);
//     foreach ($user->posts as $post) {
//         echo $post->title . "<br>";
//         echo $post->content . "<br>";
//     }
// });

// //Many to many rel
// Route::get('user/{id}/role', function ($id) {
//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//     return $user;

//     // foreach ($user->roles as $role) {
//     //     return $role->name;
//     // }
// });

// //Accessing intermediate pivot table
// Route::get('users/pivot', function () {
//     $user = User::find(1);
//     foreach ($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }
// });

// Route::get('user/country', function () {
//     $country = Country::find(2);
//     foreach ($country->posts as $post) {

//         return $post->title;
//     }
// });

// /*
// |--------------------------------------------------------------------------
// | Polymorphic rel
// |--------------------------------------------------------------------------
// */

// Route::get('user/photos', function () {
//     $user = User::find(1);

//     foreach ($user->photos as $photo) {
//         return $photo->path;
//     }
// });

// Route::get('post/photos', function () {
//     $post = Post::find(1);

//     foreach ($post->photos as $photo) {
//         return $photo->path;
//     }
// });

// Route::get('photo/{id}/post', function ($id) {
//     $photo = Photo::findOrFail($id);
//     return $photo->imageable;
// });


//many to many
// Route::get('post/tag', function () {
//     $post = Post::find(1);

//     foreach ($post->tags as $tag) {
//         echo $tag->name;
//     }
// });

// Route::get('tag/post', function () {
//     $tag = Tag::find(2);

//     foreach ($tag->posts as $post) {
//         echo $post->title;
//     }
// });

/*
|--------------------------------------------------------------------------
| CRUD app
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'web'], function () {

    Route::resource('/posts', 'PostController');

    Route::get('/dates', function () {
        $date = new DateTime('+1 year');
        echo $date->format('d-m-Y');
        echo '<br>';
        echo Carbon::now();
        echo '<br>';
        echo Carbon::now()->diffForHumans();
    });

    Route::get('/getName', function () {
        $user = User::find(1);

        echo $user->name;
    });

    Route::get('/setName', function () {
        $user = User::find(1);

        $user->name = 'ulugbek turakulov';

        $user->save();
    });
});









/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/


// Route::get('/findFail', function () {
//     // $fail = Post::findOrFail(1);
//     $fail = Post::where('users_count', '<', 50)->firstOrFail();
//     return $fail;
// });


// Route::get('/', function () {
//     return view('welcome');
//     // return "<h1>Hello World!</h1>";
// });

// Route::get('/about/2', function () {
//     return "<a href='/'>press me</a>";
// });

// Route::get('/posts/{id}', function ($id) {
//     return "<a href='/about/" . $id . "'>press me</a>";
// });

// Route::get('admin/posts/example/smth', array('as' => 'admin.home', function () {
//     $url = route('admin.home');
//     return $url;
// }));

// Route::get('/post', 'PostController@show_post');


// Route::get('/contact', 'PostController@contact');
