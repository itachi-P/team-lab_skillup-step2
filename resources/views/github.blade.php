<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>github</title>
    </head>
    <body>
        <div>{{ $info }}</div>
        <hr>
        <div>あなたのニックネームは<b>{{ $nickname }}</b>です</div>
        <div>あなたのトークンは[ {{ $token }} ]です</div>
        <h3>リポジトリ一覧</h3>
        <ul>
        @foreach($repos as $repo)
            <li>{{ $repo }}</li>
        @endforeach
        </ul>

        <hr>
        <form action="/github/issue" method="post">
            {{ csrf_field() }}
            <div>repo : <input type="text" name="repo"></div>
            <div>title : <input type="text" name="title"></div>
            <div>body : <input type="text" name="body"></div>
            <input type="submit" value="Confirm">
        </form>
    </body>
</html>