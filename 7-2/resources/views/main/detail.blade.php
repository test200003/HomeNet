@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/detail.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>detail</title>
</head>
<div class="username">
  <a href="{{ route('main.update') }}">{{ $customer->username }}さん</a>
</div>

<body>

  <div class="detail">
    <table>
      <tr>
        <th>サービス名</th>
        <td> {{ $products->name}}
        </td>
      </tr>
      <tr>
        <th>公式サイト</th>
        <td> {{ $products->url}}
        </td>
      </tr>
      <tr>
        <th>月額料金(税込み)</th>
        <td>戸建て：{{ $products->family_price}}円 <br>
          マンション：{{ $products->apart_price}}円</td>
      </tr>
      <tr>
        <th>最大通信速度</th>
        <td>{{ $products->speed}}Gbps</td>
      </tr>
      <tr>
        <th>工事費用</th>
        <td>{{ $products->cost}}円</td>
      </tr>
      <tr>
        <th>おすすめポイント</th>
        <td>{{ $products->point}}</td>
      </tr>
      <tr>
        <th>契約期間</th>
        <td>{{ $products->period}}年</td>
      </tr>

    </table>
    <div class="contracts">
      <a href="{{ route('main.contracts') }}">お申し込みへ</a>
    </div>

  </div>
</body>

@include('layouts.footer')
