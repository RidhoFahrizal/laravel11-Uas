<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\User;


Route::get('/make-post/{user}', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/{user}', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/make-post/{user:id}', function(User $user) {

    return view('make-post',['title'=>'Make Post','user' => $user]);
});

Route::get('/', function () {
    return view('home')
    ->with('title', 'Home');
});

Route::get('about', function(){
    return view('about')
    ->with('name', 'Victoria')
    ->with('occupation', 'Astronaut')
    ->with('addr', 'simo kwagean kuburan no 26')
    ->with('campus', 'politeknik Elektronika negeri surabaya ')
    ->with('shoeSize', '45')
    ->with('title', 'About');


});


// melakukan pengiriman data dari routes ke view

Route::get('/posts', function(){
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::All(),
        'user' => User::All()
        ]);
});

//Route model Binding
Route::get('/posts/{post:slug}', function(Post $post){

    return view('post', ['title'=> 'Single Post' , 'post' => $post]);
});


Route::get('contact/{user:id}', function(User $user){
    return view('contact', ['title' => 'Contact', 'user' => $user]);
});

Route::get('layout', function(){
    return view('layout', ['title' => 'Layout']);
});



