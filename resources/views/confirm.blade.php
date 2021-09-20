<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>内容確認</title>
</head>
<body>
    <div class="container">
        <div class="taitle">
            <h2>内容確認</h2>
        </div>
        <div class="contents">
            <form action="{{ route('show.post') }}" method="post">
                @csrf
                <label>お名前</label>
                <div>
                    {{$post["fullname"]}}
                </div>
                <label>性別</label>
                <div>
                    {{$post["gender"]}}
                </div>
                <label>メールアドレス</label>
                <div>
                    {{$post["email"]}}
                </div>
                <label>郵便番号</label>
                <div>
                    {{$post["postcode"]}}
                </div>
                <label>住所</label>
                <div>
                    {{$post["address"]}}
                </div>
                <label>建物名</label>
                <div>
                    {{$post["building_name"]}}
                </div>
                <label>ご意見</label>
                <div>
                    {{$post["opinion"]}}
                </div>
                <input name="send" type="submit" value="送信">
                <input name="revise" type="submit" value="修正する">
            </form>
        </div>
    </div>

</body>
</html>
