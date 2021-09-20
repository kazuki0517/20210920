<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
 <div class="container">
     <div class="title">
         <h2>お問い合わせ</h2>
     </div>
     <form action="{{ route('confirm.post') }}" method="post" class="form-horizontal">
         @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">お名前※</label>
            <div class="col-sm-5">
                <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control">
                @error('fullname')<span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 control-label">性別※</label>
            <div class="col-sm-5">
                <label><input type="radio" id="male" name="gender" value="1" checked>男性</label>
                <label><input type="radio" id="female" name="gender" value="2">女性</label>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 control-label">メールアドレス※</label>
            <div class="col-sm-5">
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                @error('email')<span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 control-label">郵便番号※</label>
            <div class="col-sm-5">
                <input type="text" id="postcode" name="postcode" value="{{ old('postcode') }}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" class="form-control">
                @error('postcode')<span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label class="col-sm-2 control-label">住所※</label>
            <div class="col-sm-5">
                <input type="text" id="address" name="address" value="{{ old('address')}}" class="form-control">
                @error('address')<span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 control-label">建物名</label>
            <div class="col-sm-5">
                <input type="text" id="building_name" name="building_name" value="{{ old('building_name') }}" class="form-control">
                @error('building_name')<span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 control-label">ご意見※</label>
            <div class="col-sm-5">
                <textarea name="opinion" id="opinion" class="form-control">{{ old('opinion') }}</textarea>
                @error('opinion')<span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <input type="submit" value="確認" class="btn btn-dark btn-lg">
    </form>
    </div>
</body>
</html>

