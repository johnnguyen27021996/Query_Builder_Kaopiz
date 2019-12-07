<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\LoginRequest;
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
    function (LoginRequest $request) {
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('users')->where('email', $email)->get()->toArray();
        if(!$user){
            return redirect()->route('login.show')->with('errorLogin', 'Tài khoản không tồn tại');
        }else{
            if(\Illuminate\Support\Facades\Hash::check($password, $user['0']->password)){
                dd('Thanh Cong');
            }
            return redirect()->route('login.show')->with('errorLogin', 'Mật khẩu không chính xác');
        }
    })->name('login.login');
Route::get('register',
    function () {
        return view('register');
    })->name('register.show');
