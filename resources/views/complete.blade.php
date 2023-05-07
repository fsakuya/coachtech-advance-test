<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
  <div class="content">
    <div class="centered">
      <p class="text">ご意見いただきありがとうございました。</p>
      <input class="contact-submit" type="submit" value="トップページへ" /><br>
    </div>
  </div>
</body>

</html>
<style>
  body,
  html {
    height: 100%;
    font-family: 'Noto Sans JP', sans-serif;
  }

  .content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  .centered {
    text-align: center;
  }

  .text {
    margin-bottom: 40px;
  }

  .contact-submit {
    width: 160px;
    background-color: #333;
    color: #fff;
    font-weight: bold;
    display: inline-block;
    margin: 0 auto;
    font-size: 16px;
    padding: 10px;
    border-radius: 6px;
    border: none;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
  }
</style>