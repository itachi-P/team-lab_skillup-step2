<?php
namespace App\Http\Controllers;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        // データの追加 ('email'の値はランダムな文字列を使用)
        $email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@yyyy.com';
        User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);
        // 全データの取り出し
        $users = User::all();
        return view('user', ['users' => $users]); 
    }
}