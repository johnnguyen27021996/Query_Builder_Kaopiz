<?php

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if (!$user) {
            return redirect()->route('login.show')->with('errorLogin', 'Tài khoản không tồn tại');
        } else {
            if (\Illuminate\Support\Facades\Hash::check($password, $user['0']->password)) {
                $request->session()->put('user', $user);
                return redirect()->route('index.show');
            }
            return redirect()->route('login.show')->with('errorLogin', 'Mật khẩu không chính xác');
        }
    })->name('login.login');
Route::get('register',
    function () {
        return view('register');
    })->name('register.show');
Route::post('register',
    function (\App\Http\Requests\RegisterRequest $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password = \Illuminate\Support\Facades\Hash::make($password);
        $NewUser = DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        if ($NewUser) {
            return redirect()->route('register.show')->with('successMessage', 'Đăng ký thành công hãy đăng nhập');
        } else {
            return redirect()->route('register.show')->with('errorMessage', 'Đăng ký thất bại');
        }
    })->name('register.register');
Route::get('logout',
    function (Request $request) {
        $request->session()->flush();
        return redirect()->route('index.show');
    })->name('logout');
Route::get('create',
    function () {
        return view('createPost');
    })->name('post.create')->middleware('customauth');
Route::post('create',
    function (\App\Http\Requests\PostRequest $request) {
        $title = $request->title;
        $body = $request->body;
        $NewPost = DB::table('posts')->insert([
            'title' => $title,
            'content' => $body,
        ]);
        if ($NewPost) {
            return redirect()->route('index.show')->with('successMessage', 'Thêm mới bài đăng thành công');
        } else {
            return redirect()->route('post.create')->with('errorMessage', 'Thêm mới bài đăng thất bại');
        }
    })->name('post.add')->middleware('customauth');
Route::get('delete/{id}',
    function ($id) {
        $use = DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('index.show')->with('successMessage', 'Xóa bài đăng thành công');
    })->name('post.delete');
