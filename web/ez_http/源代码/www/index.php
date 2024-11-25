<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ez_http</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            animation: changeBackground 10s infinite;
            position: relative;
        }

        .container {
            text-align: center;
            position: absolute;
            top: 50px;
        }

        .title {
            font-size: 4em;
            color: white;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out, bounce 2s;
        }

        .button {
            padding: 10px 20px;
            font-size: 1.5em;
            color: #ff7e5f;
            background-color: white;
            border: 1px solid skyblue;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .button:hover {
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
        @keyframes changeBackground {
            0% { background-image: url('i1.jpg'); }
            25% { background-image: url('i2.jpg'); }
            50% { background-image: url('i3.jpg'); }
            75% { background-image: url('i2.jpg'); }
            100% { background-image: url('i1.jpg'); }
        }

    </style>
</head>
<body>
<div class="container">
    <form method="get">
        <button class="button" name="tyctf">Hit the question setter</button>
    </form>
    <style>body { background-image: url('i3.jpg'); }</style>
    <h1 style="color: darkblue">小T说:
        <?php
        include("flag.php");
        // 检查是否使用 POST 方法
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die('Please use POST Method');
        }

        // 检查变量 tyctf
        if (!isset($_POST['tyctf'])) {
            die('请使用POST方法');
        }

        // 检查变量 hhh
        if (!isset($_POST['hhh']) || $_POST['hhh'] !== 'abc') {
            die('POST to hhh = abc');
        }

        // 检查请求来源
        if (strpos($_SERVER['HTTP_REFERER'], 'https://sqnu-tysec.com') !== 0) {
            die('This page must be source https://sqnu-tysec.com');
        }

        // 检查浏览器
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($userAgent, 'TYsecBrowser') === false) {
            die('你用的什么浏览器??? 是TYsecBrowser吗?');
        }

        // 检查 IP 地址
        if ($_SERVER['HTTP_X_FORWARDED_FOR'] !== '127.0.0.1') {
            die('你不是本地人!!! 何人胆敢来犯');
        }

        // 检查 Cookie
        if (!isset($_COOKIE['user']) || $_COOKIE['user'] !== 'admin') {
            die('没带曲奇饼, 或者是user曲奇饼不是admin牌的');
        }

        // 所有检查通过，输出指定字符串
        echo $flag;
        ?>
    </h1>
</div>
</body>

