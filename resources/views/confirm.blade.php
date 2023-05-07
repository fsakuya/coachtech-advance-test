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
  <div class="contact">
    <h1 class="contact-ttl">内容確認</h1>
    <form method="post" action="{{ route('contact.send') }}">
      @csrf
      <table class="contact-table">
        <tr>
          <th class="contact-item">お名前</th>
          <td class="contact-body">
            <div class="contact-body-name">
              {{ $contacts['first_name'] }}
              <input type="hidden" name="first_name" class="form-text" value="{{ $contacts['first_name'] }}" />
              {{ $contacts['second_name'] }}
              <input type="hidden" name="second_name" class="form-text" value="{{ $contacts['second_name'] }}" />
            </div>
          </td>
          </td>
        </tr>
        <tr>
          <th class="contact-item">性別</th>
          <td class="contact-body">
            <label class="contact-sex">
              {{ $gender }}
              <input type="hidden" name="gender" value="{{ $contacts['gender'] }}" />
            </label>
          </td>
        </tr>
        <tr>
          <th class="contact-item">メールアドレス</th>
          <td class="contact-body">
            {{ $contacts['email'] }}
            <input type="hidden" name="email" class="form-text" value="{{ $contacts['email'] }}" />
          </td>
        </tr>
        <tr>
          <th class="contact-item">郵便番号</th>
          <td class="contact-body">
            <span class="post-code">{{ $contacts['postcode'] }}</span>
            <input type="hidden" name="postcode" class="form-text form-text-zip" value="{{ $contacts['postcode'] }}">
          </td>
        </tr>
        <tr>
          <th class="contact-item">住所</th>
          <td class="contact-body">
            {{ $contacts['address'] }}
            <input type="hidden" name="address" class="form-text" value="{{ $contacts['address'] }}" />
          </td>
        </tr>
        <tr>
          <th class="contact-item">建物名</th>
          <td class="contact-body">
            {{ $contacts['building_name'] }}
            <input type="hidden" name="building_name" class="form-text" value="{{ $contacts['building_name'] }}" />
          </td>
        </tr>
        <tr>
          <th class="contact-item contact-item-opinion">お問い合わせ内容</th>
          <td class="contact-body form-textarea">
            {{ $contacts['opinion'] }}
            <input type="hidden" name="opinion" class="form-textarea" value="{{ $contacts['opinion'] }}"></input>
          </td>
        </tr>
      </table>
      <input class="contact-submit" name="send" type="submit" value="送信" />
      <div class="contact-back-wrap">
        <input class="contact-back" name="back" type="submit" value="修正する">
      </div>
    </form>
  </div>
</body>

</html>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    color: #333;
    font-family: 'Noto Sans JP', sans-serif;
  }

  .contact {
    width: 960px;
    margin: 0 auto;
    padding: 60px 0;
  }

  .contact-ttl {
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 40px;
    text-align: center;
  }

  .contact-table {
    width: 100%;
    margin-bottom: 20px;
  }

  .contact-item,
  .contact-body {
    padding: 20px;
  }

  .contact-item {
    text-align: left;
    width: 30%;
  }

  .contact-body {
    width: 70%;
  }

  .contact-body-name {
    justify-content: space-between;
  }

  .contact-body-name input {
    width: 47%;
  }


  .form-text {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
  }

  .contact-sex+.contact-sex {
    margin-left: 10px;
  }

  .contact-sex-txt {
    display: inline-block;
    margin-left: 5px;
  }

  .form-select {
    width: 180px;
    height: 40px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .contact-skill {
    display: block;
  }

  .contact-skill+.contact-skill {
    margin-top: 10px;
  }

  .contact-skill-txt {
    display: inline-block;
    margin-left: 5px;
  }

  .form-textarea {
    width: 100%;
    height: auto;
    vertical-align: top;
    margin: 50px;
  }

  .contact-submit {
    width: 160px;
    background-color: #333;
    color: #fff;
    font-weight: bold;
    display: block;
    margin: 0 auto;
    margin-bottom: 5px;
    font-size: 16px;
    padding: 10px;
    border-radius: 6px;
    border: none;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;

  }

  .required-mark {
    color: red;
  }

  .contact-body-name {
    display: flex;
  }

  .contact-body-address {
    display: flex;
  }

  .form-text-zip {
    width: 95%;
  }

  .post-mark {
    width: 5%;
    display: inline-block;
    text-align: center;
    line-height: 40px;
  }

  .contact-item-opinion {
    vertical-align: top;
  }

  /* 修正するボタンのスタイル */
  .contact-back {
    width: auto;
    font-size: 14px;
    /* 文字のサイズを小さくする */
    padding: 0;
    background: none;
    border: none;
    color: black;
    text-decoration: underline;
    text-align: center;
  }


  /* ホバー時の修正するボタンのスタイル */
  .contact-back:hover {
    text-decoration: none;
  }

  .contact-back-wrap {
    text-align: center
  }
</style>