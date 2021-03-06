<?php declare(strict_types=1);

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>6. Laravel導入</title>
</head>
<body>
<h1>6. Laravel導入</h1>
<h2>1. mvcについて調べて説明してください<br>webの3層構造について調べてください</h2>
<h3>mvcとは</h3>
<p>プログラム処理をM（Model）、V（View）、C（Controller）という概念的な役割に分け、それぞれの役割が協調し合うことで1つの画面機能を実現するという、ソフトウェアアーキテクチャのこと。</p>
<ul>
    <li>Model-ビジネスロジックを担当する</li>
    <li>View-表示データを担当する</li>
    <li>Model-全体のコントロールを担当する</li>
</ul>
<hr>

<h2>2. laravelをインストールしてhello worldを表示してください。<br>なお、php artisan serveは使わずに、composerなど、必要なものがあるので準備してください</h2>
<a href="public/hello" target="_blank">こちらに実装</a>
<hr>

<h2>3. addページへのルート登録を行いページを表示してください。<br>その際、routeに直接書くパターンと、controllerを作るパターン２つ試してください。<br>(ルートの理解,controllerの理解)</h2>
<p>routeに直接書くパターンは6-2で実装</p>
<a href="public/add" target="_blank">controllerを作るパターンをこちらに実装</a>
<hr>

<h2>4. viewファイルをresource/views配下に起き、controllerからviewを呼び出してください。</h2>
<a href="public/test" target="_blank">こちらに実装</a>
<hr>

<h2>5. viewをbladeのテンプレートを使い、controllerで定義した変数を表示してください。</h2>
<a href="public/test/hello" target="_blank">こちらに実装</a>
<hr>

<h2>6. マイグレーションを理解しよう。<br>マイグレーションで新しくtableを追加してください。<br>カラムは、Id(int)とname(text)など<br>マイグレーションで作ったテーブルをロールバックしてください。</h2>
<a href="https://github.com/obake-fe/php_study/commit/67ad35226fa0c425084107284a066c962931a2f0" target="_blank" rel="noreferrer">commit log</a>
<hr>

<h2>7. artisanコンソールの機能を使用し、[ php artisan hello ] コマンドを叩いた時に 「hello world」とターミナル上に表示されるようにプログラムを作成してください。</h2>
<a href="https://github.com/obake-fe/php_study/commit/d233bc77316ace7c7e1550e811d169e0e01aaa48" target="_blank" rel="noreferrer">commit log</a>
<hr>


<h2>8. 新しく追加したtableに、insertできるような処理を書いてください。<br>その際、artisanコンソールの機能を使い、コマンドラインから実行できるようにしてください<br>(modelを使用)</h2>
<a href="https://github.com/obake-fe/php_study/commit/ade24ff8719a870ec206cd9b42c41e00456fb0c0" target="_blank" rel="noreferrer">commit log</a>
<hr>

<h2>9. controllerからmodelを呼び出し、画面で入力したnameをdbに保存するような機能を作ってください。<br>この際、FormRequestを利用し、nameが5文字以下でアルファベットのみであることのバリデーションをおこなってください</h2>
<a href="public/person/add" target="_blank">こちらに実装</a>

</body>
</html>
