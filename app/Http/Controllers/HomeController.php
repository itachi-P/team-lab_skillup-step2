<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Image;

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
                // 入力必須であること
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
            $path = $request->file->store('public');    //storage/app/publicに保存
            // return view('home')->with('filename', basename($path));

            // （課題）画像をアップロードと同時にDBにファイルパスを保存する形式に変更
            $parameter = ['filename' => basename($path),];
            $sqlValue = "'" . basename($path) . "'";
            $image = new Image;
            $image->fill($parameter)->save();
            return view('home', $parameter);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}