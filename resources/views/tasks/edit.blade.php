<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <h1>投稿論文編集</h1>
    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('PATCH')
        <p>論文タイトル</p>
        <p>
            <label for="title"><input type="text" name="title" value="{{ old('title', $task->title) }}"></label>
        </p>
        <p>本文</p>
        <p>
            <textarea name="body">{{ old('body', $task->body) }}</textarea>
        </p>
        <input type="submit" value="更新">
        <!-- 一覧へ戻る -->
        <input type="button" onclick="location.href='/tasks'" value="一覧へ戻る">
    </form>

</body>

</html>
