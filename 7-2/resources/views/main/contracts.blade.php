@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/contracts.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>contracts</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

</head>
<div class="username">
  <a href="{{ route('main.update') }}">{{ $customer->username }}さん</a>
</div>

<body>

  <div class="contracts">
    <div class="contracts-box">
      <div class="contracts-title">
        <p>お申し込み</p>
      </div>
      <form action="{{ route('main.con_confirm') }}" method="post" name="form">
        {{ csrf_field() }}
        <div class="line">
        </div>
        <div class="contracts-menu">
          <div class="contracts-title">
            <dt><label for="name">名前<span>*</span></label></dt>
            <div class="error-msg">
              @error('name')
              {{ $message }}
              @enderror
            </div>
          </div>
          <input type="text" name="name" placeholder="ヤマダ タロウ">
          <i class="fa fa-user fa-lg fa-fw"></i>

        </div>
        <div class="contracts-menu">
          <div class="contracts-title">
            <dt><label for="tel">電話番号<span>*</span></label></dt>
            <div class="error-msg">
              @error('tel')
              {{ $message }}
              @enderror
            </div>
          </div>
          <input type="text" name="tel" placeholder="123-456-789">
          <i class="fa fa-phone fa-lg fa-fw"></i>
        </div>
        <div class="contracts-menu">
          <div class="contracts-title">
            <dt><label for="post">郵便番号<span>*</span></label></dt>
            <div class="error-msg">
              @error('post')
              {{ $message }}
              @enderror
            </div>
          </div>
          <input type="text" name="post" placeholder="123-4567" onKeyUp="AjaxZip3.zip2addr(this, '', 'address', 'address');">
          <i class=" fas fa-search fa-lg fa-fw"></i>
        </div>
        <div class="contracts-menu">
          <div class="contracts-title">
            <dt><label for="address">設置先住所<span>*</span></label></dt>
            <div class="error-msg">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
          <input type="text" placeholder="○○県 ○○市" name="address" size="60">
          <i class="fas fa-home fa-lg fa-fw"></i>
        </div>
        <div class="contracts-menu">
          <div class="contracts-title">
            <dt><label for="type">住居タイプ<span>*</span></label></dt>
            <div class="error-msg">
              @error('type')
              {{ $message }}
              @enderror
            </div>
          </div>
          <input type="radio" name="type" value="マンション">マンション
          <input type="radio" name="type" value="戸建て">戸建て
        </div>
        <div class="contracts-menu">
          <button class="contracts2" name="submit" type="submit">確認画面へ
          </button>
        </div>
    </div>
  </div>
  </form>

</body>
@include('layouts.footer')
