<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/',
    function () {
        $posts = DB::table('posts')->orderBy('id', 'desc')->paginate(5);
        return view('index', compact('posts'));
    })->name('index.show');
Route::get('login',
    function () {
        return view('login');
    })->name('login.show');
Route::post('login',
    function (Request $request) {
        $username = $request->username;
        $password = $request->password;
        dd($username.$password);
    })->name('login.login');
Route::get('register',
    function () {
        return view('register');
    })->name('register.show');
