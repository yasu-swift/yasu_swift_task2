<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- エラー文表示 --}}
    @if ($errors->any())
        <div class="error">
            <p>
                <b>【エラー内容】</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>タスク一覧</h1>
    @foreach ($tasks as $task)
        <div class="list">
            <a href="/tasks/{{ $task->id }}">
                <p>{{ $task->title }}</p>
            </a>
            <!-- 削除ボタン -->
            <form action="/tasks/{{ $task->id }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除する"
                    onclick="if(!confirm('{{ $task->title }}を本当に削除しますか？')){return false}">
            </form>
        </div>
    @endforeach
    <hr>
    <h1>新規論文投稿</h1>
    <form action="/tasks" method="post">
        @csrf
        <p>タイトル</p>
        <p>
            <label for="title"><input type="text" name="title" value="{{ old('title') }}"></label>
        </p>
        <p>内容</p>
        <p>
            <label for="body"><textarea name="body" value="{{ old('body') }}"></textarea></label>
        </p>
        <input type="submit" value="Create Task">
    </form>


    <!-- 新規登録画面へジャンプする -->
    {{-- <input type="button" onclick="location.href='/tasks/create'" value="新規登録"> --}}
</body>

</html>
