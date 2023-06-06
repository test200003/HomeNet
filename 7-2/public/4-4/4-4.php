<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./base.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(function() {
      $(window).scroll(function() {
        $("#button").each(function() {
          var scroll = $(window).scrollTop();
          if (scroll > 200) {
            $(this).addClass("jump");
          } else {
            $(this).removeClass("jump");
          };
        });
      })
      $("#button").click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 500);
      });
    });
  </script>
  <title>4-4</title>
</head>
<div class="box1">
  <p>新型コロナウィルスに対する取り組みの最新情報をご案内</p>
</div>
<?php include('./header.php');
?>
<?php include('./form.php')
?>
<div class="top">
  <img src="./img/eyecatch.jpg">
</div>
<div class="top-text">
  <p>あなたの<br>好きな空間を作る。</p>
</div>
<div class="cafe-info">
  <div class="info">
    <div class="info-img"><img src="./img/cafe1.jpg"></div>
    <div class="info-text">
      <p>東京<br>車で１５分</p>
    </div>
  </div>
  <div class="info">
    <div class="info-img"><img src="./img/cafe2.jpg"></div>
    <div class="info-text">
      <p>神奈川<br>車で３０分</p>
    </div>
  </div>
  <div class="info">
    <div class="info-img"><img src="./img/cafe3.jpg"></div>
    <div class="info-text">
      <p>愛知<br>車で１時間</p>
    </div>
  </div>
  <div class="info">
    <div class="info-img"><img src="./img/cafe4.jpg"></div>
    <div class="info-text">
      <p>京都<br>車で４０分</p>
    </div>
  </div>
  <div class="info">
    <div class="info-img"><img src="./img/cafe5.jpg"></div>
    <div class="info-text">
      <p>岡山<br>車で１．５時間</p>
    </div>
  </div>
  <div class="info">
    <div class="info-img"><img src="./img/cafe6.jpg"></div>
    <div class="info-text">
      <p>鹿児島<br>車で５０分</p>
    </div>
  </div>
  <div class="info">
    <div class="info-img"><img src="./img/cafe7.jpg"></div>
    <div class="info-text">
      <p>沖縄<br>車で２時間</p>
    </div>
  </div>
</div>
<div class="location-title">
  <p>好きなロケーションを選ぼう</p>
</div>
<div class="cafe-location">
  <div class="location">
    <div class="location-img"><img src="./img/intro1.jpg"></div>
    <div class="location-text">
      <p>クラシック</p>
    </div>
  </div>
  <div class="location">
    <div class="location-img"><img src="./img/intro2.jpg"></div>
    <div class="location-text">
      <p>バー</p>
    </div>
  </div>
  <div class="location">
    <div class="location-img"><img src="./img/intro3.jpg"></div>
    <div class="location-text">
      <p>キャンプ</p>
    </div>
  </div>
  <div class="location">
    <div class="location-img"><img src="./img/intro4.jpg"></div>
    <div class="location-text">
      <p>リゾート</p>
    </div>
  </div>
</div>
<div class="goto">
  <div class="goto-img"><img src="./img/goto.jpg"></div>
  <div class="goto-box">
    <div class="goto-title">
      <P>Go To Eats</P>
    </div>
    <div class="goto-text">
      <p>キャンペーンを利用して、全国で食事しよう。<br>いつもと違う景色に囲まれてカラダもココロもリフレッシュ。</p>
    </div>
  </div>
</div>
<div class="cafe-box">
  <div class="exp-title">
    <p>カフェ作りを体験しよう</p>
  </div>
  <div class="exp-text1">
    <p>お店のエキスパートが案内するユニークな体験（直接対面型またはオンライン）。</p>
  </div>
  <div class="cafe-exp">
    <div class="exp">
      <div class="exp-img"><img src="./img/exp1.jpg"></div>
      <div class="exp-text2">
        <P>ジョブ体験</P><br>
        <p1>カフェカウンターを体験しよう。</p1>
      </div>
    </div>
    <div class="exp">
      <div class="exp-img"><img src="./img/exp2.jpg"></div>
      <div class="exp-text2">
        <P>レシピ体験</P><br>
        <p1>美味しいレシピを考えてみよう。</p1>
      </div>
    </div>
    <div class="exp">
      <div class="exp-img"><img src="./img/exp3.jpg"></div>
      <div class="exp-text2">
        <P>プロモーション体験</P><br>
        <p1>お店の宣伝を手伝ってみよう。</p1>
      </div>
    </div>
  </div>
</div>
<div class="host-title">
  <p>全国のホストに仲間入りしよう</p>
</div>
<div class="cafe-host">
  <div class="host">
    <div class="host-img"><img src="./img/host1.jpg"></div>
    <div class="host-text">
      <p>ビジネス</p>
    </div>
  </div>
  <div class="host">
    <div class="host-img"><img src="./img/host2.jpg"></div>
    <div class="host-text">
      <p>コミュニティ</p>
    </div>
  </div>
  <div class="host">
    <div class="host-img"><img src="./img/host3.jpg"></div>
    <div class="host-text">
      <p>食べ歩き</p>
    </div>
  </div>
</div>
<div id="button">
  <button class="jump_button" type="button">Jump To Top</button>
</div>
<?php include('./footer.php');
?>

<body>
</body>

</html>
