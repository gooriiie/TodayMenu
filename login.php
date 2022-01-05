<?php
    $restAPIKey = "af9606e200b85fb3bd50857f43641a9a";
    $callbackURI = urlencode("http://localhost/TermProject/login_callback.php");
    $kakaoLoginURL = "https://kauth.kakao.com/oauth/authorize?client_id=" . $restAPIKey . "&redirect_uri=" . $callbackURI . "&response_type=code";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TermProject</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./index.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="titleDiv">
        <p id="title">오늘의 메뉴 추천</p>
    </div>
    <div id="loginDiv">
        <a href="<?= $kakaoLoginURL ?>">
            <img src="./kakao_login_medium_narrow.png" alt="loginBtn">
        </a>
    </div>
    <script src="./index.js"></script>
</body>
</html>