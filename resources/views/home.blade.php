<!DOCTYPE HTML>
<html>
<head>
    <title>画像アップロード</title>
</head>
<body>

<h1>画像アップロード</h1>
{{-- imagesテーブルから取得した保存済み画像リンク一覧 --}}
@if (isset($images))    
<ul>
    @foreach ($images as $image)
    <li>
        <a href="images/{{ $image->filename }}" target="_brank">
            <img src="images/{{ $image->filename }}" width="100px" height="100px" />
        </a>   
    </li>
    @endforeach
</ul>
@endif

<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach ($errors as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">

    <!-- 直前にアップロードした画像。なければ表示しない -->
    @isset($filename)
    <div>
        <img src="{{ asset('images/' . $filename) }}">
    </div>
    @endisset

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-succes"> Upload </button>
</form>

</body>
</html>