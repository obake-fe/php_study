<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddController extends Controller
{
    public function index(): string {
        return <<<EOF
<html>
<head>
<title>6-3</title>
</head>
<body>
    <h1>Laravel導入</h1>
    <h2>3. addページへのルート登録を行いページを表示してください。<br>その際、routeに直接書くパターンと、controllerを作るパターン２つ試してください。<br>(ルートの理解,controllerの理解)</h2>
    <p>php artisan make:controller AddControllerで追加</p>
</body>
</html>
EOF;
    }
}
