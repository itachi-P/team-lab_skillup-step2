<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('home', ['images' => $images]);
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
//            $parameter = ['filename' => basename($path),];	
            $images = new Image;	
            $images->fill(['filename' => basename($path)])->save();
            //Image::insert(["filename" => basename($path)]);
            $images = Image::all();
            $parameters = ['images' => $images, 'filename' => basename($path)];
            return view('home', $parameters); 
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}