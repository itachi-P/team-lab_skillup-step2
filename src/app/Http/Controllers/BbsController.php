<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BbsController extends Controller
{
    // Indexページの表示
    public function index() {
        return view('bbs.index');
    }

    // 投稿された内容を表示するページ
    public function create(Request $request) {

        // 投稿内容を受け取って変数に入れる
        $name = $request->input('name');
        $comment = $request->input('comment');

        // 変数をビューに渡す
        return view('bbs.index')->with(["name" => $name, "comment"  => $comment,]);
    }
}