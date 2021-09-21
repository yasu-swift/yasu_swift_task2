<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>タスク詳細</h1>
    <p>【タイトル】<br> {{ $task->title }}</p>
    <p>【内容】 <br> {{ $task->body }}</p>
    <div class="button">

        <!-- 削除ボタン -->
        <form action="/tasks/{{ $task->id }}" method="post">
            <!-- 一覧へ戻る -->
            <input type="button" onclick="location.href='/tasks'" value="一覧へ戻る">

            <!-- タスクのidを元に編集ページへ遷移する -->
            <input type="button" value="編集" onclick="location.href='/tasks/{{ $task->id }}/edit'">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('{{ $task->title }}を本当に削除しますか？')){return false}">
        </form>
    </div>
</body>

</html>
