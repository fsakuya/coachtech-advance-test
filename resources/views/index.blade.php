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
    <h1 class="contact-ttl">お問い合わせ</h1>
    <form method="post" action="{{ route('contact.confirm') }}" class="h-adr">
      @csrf
      <table class="contact-table">
        <tr>
          <th class="contact-item">お名前<span class="required-mark">※</span>
          </th>
          <td class="contact-body">
            <div class="contact-body-name">
              <input type="text" name="first_name" class="form-text" value="{{ old('first_name') }}" />
              <input type="text" name="second_name" class="form-text" value="{{ old('second_name') }}" />
            </div>
          </td>
        </tr>
        @if ($errors->has('first_name') || $errors->first('second_name'))
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body">
            <div class="contact-body-name">
              <div class="name-error">{{$errors->first('first_name')}}</div>
              <div class="name-error">{{$errors->first('second_name')}}</div>
            </div>
          </td>
        </tr>
        @endif
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body-example">
            <div class="contact-body-name">
              <span class="example">例）山田</span>
              <span class="example">例）太郎</span>
            </div>
          </td>
        </tr>
        <tr>
          <th class="contact-item">性別<span class="required-mark">※</span></th>
          <td class="contact-body">
            <div class="radiobutton">
              <input type="radio" id="button-1" name="gender" value="1" {{  old('gender') == null || old('gender') == 1 ? 'checked' : '' }} />
              <label for="button-1" class="radio-label">男性</label>
              <input type="radio" id="button-2" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : ''}} />
              <label for="button-2" class="radio-label">女性</label>
            </div>
          </td>
        </tr>
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body-example">
            <span class="example"></span>
          </td>
        </tr>
        <tr>
          <th class="contact-item">メールアドレス<span class="required-mark">※</span></th>
          <td class="contact-body">
            <input type="text" name="email" class="form-text" value="{{ old('email') }}" />
          </td>
        </tr>
        @if ($errors->has('email'))
        <tr>
          <th></th>
          <td>{{$errors->first('email')}}</td>
        </tr>
        @endif
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body-example">
            <span class="example">例）test@example.com</span>
          </td>
        </tr>
        <tr>
          <th class="contact-item">郵便番号<span class="required-mark">※</span></th>
          <td class="contact-body">
            <div class="contact-body-address">
              <span class="post-mark">〒</span>
              <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
              <span class="p-country-name" style="display:none;">Japan</span>
              <input type="text" name="postcode" class="form-text form-text-zip p-postal-code" value="{{ old('postcode') }}">
            </div>
          </td>
        </tr>
        @if ($errors->has('postcode'))
        <tr>
          <th></th>
          <td>{{$errors->first('postcode')}}</td>
        </tr>
        @endif
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body-example">
            <span class="example-postcode">例）123-4567</span>
          </td>
        </tr>
        <tr>
          <th class="contact-item">住所<span class="required-mark">※</span></th>
          <td class="contact-body">
            <input type="text" name="address" class="form-text p-region p-locality p-street-address p-extended-address" value="{{ old('address') }}" />
          </td>
        </tr>
        @if ($errors->has('address'))
        <tr>
          <th></th>
          <td>{{$errors->first('address')}}</td>
        </tr>
        @endif
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body-example">
            <span class="example">例）東京都渋谷区千駄ヶ谷1-2-3</span>
          </td>
        </tr>
        <tr>
          <th class="contact-item">建物名</th>
          <td class="contact-body">
            <input type="text" name="building_name" class="form-text" value="{{ old('building_name') }}" />
          </td>
        </tr>
        <tr>
          <th class="contact-item"></th>
          <td class="contact-body-example">
            <span class="example">例）千駄ヶ谷マンション101</span>
          </td>
        </tr>
        <tr>
          <th class="contact-item contact-item-opinion">ご意見<span class="required-mark">※</span></th>
          <td class="contact-body">
            <textarea name="opinion" class="form-textarea">{{ old('opinion') }}</textarea>
          </td>
        </tr>
        @if ($errors->has('opinion'))
        <tr>
          <th></th>
          <td>{{$errors->first('opinion')}}</td>
        </tr>
        @endif
      </table>
      <input class="contact-submit" type="submit" value="確認" />
    </form>
  </div>
</body>

</html>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const postcodeInput = document.querySelector('input[name="postcode"]');
    postcodeInput.addEventListener('input', function() {
      let value = this.value.replace(/[０-９]/g, function(s) {
        return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
      });
      value = value.replace(/[‐－―]/g, '-'); 
      this.value = value;
    });
  });
</script>

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
    padding: 20px 0;
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
    padding: 1px;
  }

  .contact-item {
    text-align: left;
    width: 20%;
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
    padding: 10px;
    height: 200px;
    border-radius: 5px;
    border: 1px solid #ccc;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
  }

  .contact-submit {
    width: 160px;
    background-color: #333;
    color: #fff;
    font-weight: bold;
    display: block;
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

  .required-mark {
    color: red;
  }

  .contact-body-name {
    display: flex;
  }

  .contact-body-address {
    display: flex;
    justify-content: center;
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

  .name-error {
    width: 47%;
  }

  .contact-item-opinion {
    vertical-align: top;
  }

  .contact-body-example {
    padding-top: 6px;
    padding-bottom: 30px;
  }


  .contact-body-name span {
    width: 47%;
  }

  .example {
    color: gray;
    padding-left: 15px;
  }

  .example-postcode {
    color: gray;
    padding-left: 60px;
  }

  .radiobutton label {
    padding: 0 0 0 40px;
    /* ラベルの位置 */
    font-size: 16px;
    line-height: 28px;
    /* ボタンのサイズに合わせる */
    display: inline-block;
    cursor: pointer;
    position: relative;
  }

  .radiobutton label:before {
    content: '';
    width: 28px;
    /* ボタンの横幅 */
    height: 28px;
    /* ボタンの縦幅 */
    position: absolute;
    top: 0;
    left: 0;
    background-color: white;
    border-radius: 50%;
    border: 1px solid black;
  }

  .radiobutton input[type="radio"] {
    display: none;
  }

  .radiobutton input[type="radio"]:checked+label:after {
    content: '';
    width: 8px;
    /* マークの横幅 */
    height: 8px;
    /* マークの縦幅 */
    position: absolute;
    top: 11px;
    left: 11px;
    background-color: black;
    border-radius: 50%;
  }

  .radio-label {
    display: inline-flex;
    align-items: center;
    margin-right: 30px;
  }
</style>