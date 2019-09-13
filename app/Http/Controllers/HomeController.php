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
            //$path = $request->file->store('public');
            $filename = $request->file->getClientOriginalName(); //一意なID発行の方が望ましい
            $move = $request->file->move('./images', $filename);
            // echo '$move:' . $move;

            $images = new Image;
            $images->fill(['filename' => $filename])->save();
            $images = Image::all();
            $parameters = ['filename' => $filename, 'images' => $images];
            return view('home', $parameters);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}