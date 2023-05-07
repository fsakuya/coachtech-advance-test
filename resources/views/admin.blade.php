<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="../css/reset.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>

  <h1 class="contact-ttl">管理システム</h1>
  <div class="content">
    <form method="get" action="{{ route('admin.search') }}">
      @csrf
      <div class="search-box">
        <div class="content-body">
          <p class="content-title content-title-name">お名前</p>
          <input type="text" name="name" class="name-input" value="{{ request()->input('name') }}">
          <p class="content-title content-title-sex">性別</p>
          <div class="radiobutton">
            <input type="radio" id="button-2" name="gender" value="0" {{ request()->input('gender') == 0 ? 'checked': '' }}>
            <label for="button-2" class="radio-label">全て</label>
            <input type="radio" id="button-0" name="gender" value="1" {{ request()->input('gender') == 1 ? 'checked': '' }}>
            <label for="button-0" class="radio-label">男性</label>
            <input type="radio" id="button-1" name="gender" value="2" {{ request()->input('gender') == 2 ? 'checked' : '' }}>
            <label for="button-1" class="radio-label">女性</label>
          </div>
        </div>
        <div class="content-body">
          <p class="content-title content-title-date">登録日</p>
          <input class="created_at_start" type="date" name="created_at_start" value="{{ request()->input('created_at_start') }}">
          <span>~</span>
          <input class="created_at_end" type="date" name="created_at_end" value="{{ request()->input('created_at_end') }}">
        </div>
        <div class="content-body">
          <p class="content-title content-title-email">メールアドレス</p>
          <input type="email" name="email" value="{{ request()->input('email') }}">
        </div>
        <div class="buttons">
          <input class="contact-submit" name="search" type="submit" value="検索" /><br>
          <div class="contact-back-wrap">
            <input class="contact-back" id="reset-button" name="reset" type="reset" value="リセット" />
          </div>
        </div>
    </form>
  </div>
  {{ $contacts->links('pagination::bootstrap-5') }}
  <div class="list">
    <table>
      <tr class="table-hedder">
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
        <th></th>
      </tr>
      @foreach($contacts as $contact)
      <tr>
        <td width="6%">{{ $contact->id }}</td>
        <td width="14%">{{ $contact->fullname}}</td>
        <td width="10%">
          @if ($contact->gender == 1)
          男性
          @elseif ($contact->gender == 2)
          女性
          @endif
        </td>
        <td width="20%">{{ $contact->email }}</td>
        <td width="40%">
          <span class="limited-text" title="{{ $contact->opinion }}">{{ $contact->opinion }}</span>
        </td>
        </td>
        <td width="10%">
          <form method="post" action="{{ route('admin.delete', $contact->id) }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $contact->id }}" />
            <button type="submit" class="button-delete">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>

</html>
<script>
  const applyTextLimit = () => {
    let maxLength = 25; //上限文字数
    let limitedTexts = document.querySelectorAll('.limited-text');

    limitedTexts.forEach(limitedText => {
      let originalText = limitedText.innerText;
      if (originalText.length > maxLength) {
        limitedText.innerText = originalText.substr(0, maxLength) + '...';
      }
    });
  }
  applyTextLimit();

  document.getElementById('reset-button').addEventListener('click', function() {
    const url = window.location.href.split('?')[0];
    window.location.href = url;
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

  .contact-ttl {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin: 25px auto;
  }

  .content {
    width: 80%;
    margin: 0px auto;
  }


  .content-body {
    display: flex;
    align-items: center;
    padding-bottom: 20px;
  }


  .content-title {
    width: 150px;
    margin-bottom: 0px;
  }

  .name-input {
    margin-right: 30px;
  }

  .created_at_start {
    margin-right: 20px;
  }

  .created_at_end {
    margin-left: 20px;
  }

  .content-title-sex {
    width: 80px;
  }

  .search-box {
    border: 1px solid black;
    padding: 25px;
    margin-bottom: 30px;
  }

  .table-hedder {
    border-bottom: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0px 10px;
    font-size: 14px;
  }

  th {
    border-bottom: 1px solid black;
  }

  th,
  td {
    padding-left: 40px;
    /* 好みのピクセル数に変更できます */
  }


  input {
    width: 30%;
    padding: 10px;
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

  /* リセットボタンのスタイル */
  .contact-back {
    width: auto;
    font-size: 14px;
    /* 文字のサイズを小さくする */
    padding: 0;
    background: none;
    border: none;
    color: black;
    text-decoration: underline;
    cursor: pointer;
  }

  /* ホバー時の修正するボタンのスタイル */
  .contact-back:hover {
    text-decoration: none;
  }

  .radiobutton {
    margin: 0;
    align-items: center;
  }

  .radiobutton label {
    padding: 0 20px 0 40px;
    /* ラベルの位置 */
    font-size: 16px;
    line-height: 28px;
    /* ボタンのサイズに合わせる */
    display: inline-block;
    cursor: pointer;
    position: relative;
    margin-bottom: 0;
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
    top: 10px;
    left: 10px;
    background-color: black;
    border-radius: 50%;
  }

  .buttons {
    text-align: center;
  }

  .page-item.active,
  .page-link {
    color: black !important;
    background: white !important;
  }

  .page-item.active .page-link {
    color: white !important;
    background-color: black !important;
    border-color: black !important;
  }

  .page-link:hover {
    color: white !important;
    background-color: #333 !important;
    border-color: #333 !important;
  }

  .text-muted {
    letter-spacing: -1px;
    color: black !important;
  }

  .page-item.active {
    color: white !important;
    background: #000 !important;
  }

  .fw-space {
    margin-left: 20px;
  }

  .button-delete {
    width: 160px;
    background-color: #333;
    color: #fff;
    font-weight: bold;
    display: inline-block;
    margin: 0 auto;
    font-size: 14px;
    width: 60px;
    padding: 2px;
    border-radius: 6px;
    border: none;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
  }
</style>