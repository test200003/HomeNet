@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/main.css">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script>
    $(function() {
      $('#sort').change(function() {
        $('#form').submit();
      });
    });
  </script>
  <title>main</title>
</head>
<div class="username">
  <a href="{{ route('main.update') }}">{{ $customer->username }}さん</a>
</div>

<body>
  <div class="sortbutton">
    <form id="form">
      <p>並び替え：</p> <select name='sort' id='sort'>
        <option value="1">{{ $select == '1' ? 'selected': '' }} 指定なし</option>
        <option value="2">{{ $select == '2' ? 'selected': '' }} 速度早い順</option>
        <option value="3">{{ $select == '3' ? 'selected': '' }} 工事費安い順</option>
        <option value="4">{{ $select == '4' ? 'selected': '' }} 価格順安い順</option>

      </select>
    </form>
  </div>
  @foreach ($products as $row)
  <div class="main">
    <div class="main-box">
      {{ $row->name}}
    </div>
    <div class="main-box2">
      <div class="price">
        <p>マンションタイプ　</p>{{ $row->apart_price}}
        <p>円</p>
      </div>
      <div class="point">
        <p>最大通信速度　{{ $row->speed}}Gbps　　工事費用　{{ $row->cost}}円</p>
      </div>
    </div>
    <div class="detail">
      <form action="{{ route('main.detail') }}" method="post">
        {{ csrf_field() }}
        <a href="/detail/{{ $row->id }}">詳細</a>
        <input type="hidden" name="id" value="{{ $row->id }}">
      </form>
    </div>
  </div>
  @endforeach



</body>
@include('layouts.footer')
