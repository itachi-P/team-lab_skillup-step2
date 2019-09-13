<!DOCTYPE HTML>
<html>
<head>
    <title>画像アップロード</title>
</head>
<body>

<h1>画像アップロード</h1>
{{-- imagesテーブルから取得した保存済み画像リスト --}}
@if (isset($images))    
<ul>
    @foreach ($images as $image)
    <li><a href="images/{{ $image->filename }}" target="_brank">{{ $image->filename }}
        <img src="images/{{ $image->filename }}" border="0" width="100px" height="100px" /></a>
    
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

    <!-- アップロードした画像。なければ表示しない -->
    @isset($filename)
    <div>
        {{-- <p>filename: {{$filename}}</p> --}}
        {{-- <p>user_id: {{$user_id}}</p> --}}
        {{-- <img src="{{ asset('storage/' . $filename) }}"> --}}
        {{-- <img src="/images/{{$filename}}">  --}}
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