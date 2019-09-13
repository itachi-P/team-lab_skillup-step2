<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            //$path = $request->file->move('~/LaravelPrj/src/storage/app/public/');
            //$path = $request->file->store('public');
            $filename = $request->file->getClientOriginalName();
            echo '$filename:' . $filename;
            $move = $request->file->move('./images', $filename);
            echo '$move:' . $move;
            return view('home')->with('filename', basename($move));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}