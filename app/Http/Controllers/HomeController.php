<?php
namespace App\Http\Controllers;

use Illumin1ate\Http\Request;
use App\Model\Image;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        /* STEP2-6.GitHub連携ログインで用意したuserテーブル(デフォルトのusersとは別物かつModel無し)
        /  use Illuminate\Support\Facades\DBともどもテスト表示用おまけコード。必要性なし
        */
        $app_user = DB::select('select * from user where github_id = "itachi-P"');
        dump($app_user);

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
            // echo '$filename:' . $filename;
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