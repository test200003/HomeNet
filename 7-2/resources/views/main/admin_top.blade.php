@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/admin_top.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>admin_top</title>
</head>

<body>
  <div class="admin">
    <a href="{{ route('main.admin_main') }}">管理者用メインページへ</a>
  </div>
  <h2>登録者情報</h2>
  @foreach ($customer as $row)


  <table>
    <tr>
      <th>ユーザーネーム</th>
    </tr>
    <tr>
      <td> {{ $row->username }}さん</td>
      <td> {{ $row->mail }}</td>
    </tr>
  </table>
</body>
@endforeach
