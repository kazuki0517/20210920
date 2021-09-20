<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理システム</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h2>管理システム</h2>
        </div>
        <form method="post" action="{{ route('management.find') }}">
            @csrf
            <div class="name_search">
                <label>お名前</label>
                <input type="search" name="fullname" value="@if(isset($fullname)) {{$fullname}} @endif">
            </div>
            <div class="gender_search">
                <label>性別</label>
                <input type="radio" name="gender" id="all">
                <label for="all">全て</label>
                <input type="radio" name="gender" id="male">
                <label for="male">男性</label>
                <input type="radio" name="gender" id="female">
                <label>女性</label>
            </div>
            <div class="day_search">
                <label>登録日</label>
                <input type="date">~<input type="date">
            </div>
            <div class="email_search">
                <label>メールアドレス</label>
                <input type="text">
            </div>
            <input type="submit" value="検索">
            <input type="submit" value="リセット">
        </form>
        <div class="contact_views">
            <table>
                <tr>
                    <th>ID</th>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>ご意見</th>
                    <th></th>
                </tr>
                @foreach ($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->fullname}}</td>
                    @if ($post->gender == 1){
                        <td>男性</td>
                    }@else{
                        <td>女性</td>
                    }
                    @endif
                    {{-- <td>{{$post->gender}}</td> --}}
                    <td>{{$post->email}}</td>
                    <td>{{$post->opinion}}</td>
                    <td>
                <form action="{{ route('management.delete', $post->id)}}" method="post">
                @csrf
                @method('delete')
                        <input type="submit" value="削除">
                </form>
                    </td>
                </tr>
                @endforeach
            </table>
                {{ $posts->links() }}
        </div>
    </div>
</body>
</html>

{{-- <style>
        svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }
</style> --}}
