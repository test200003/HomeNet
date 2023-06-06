@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/admin_main.css">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <title>admin_main</title>
</head>

<body>
  <div class="admin">
    <a href="{{ route('main.admin_top') }}">管理者用トップページ</a>
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

    @if ($row->del_flg === 0)
    <div class="delete">
      <form action="{{ route('main.admin_delete',[$row->id])  }}" method="post">
        {{ csrf_field() }}

        <input type="submit" name="id" value="非表示" onclick="return confirm('表示を変更しても良いですか？')"></input>
        <input type="hidden" name="id" value="{{ $row->id }}">
      </form>
    </div>
    @endif


    @if ($row->del_flg === 1)
    <div class="delete">
      <form action="{{ route('main.admin_display',[$row->id])  }}" method="post">
        {{ csrf_field() }}

        <input type="submit" name="id" value="表示" onclick="return confirm('表示を変更しても良いですか？')"></input>
        <input type="hidden" name="id" value="{{ $row->id }}">
      </form>
    </div>
    @endif
  </div>
  @endforeach



</body>
@include('layouts.footer')
