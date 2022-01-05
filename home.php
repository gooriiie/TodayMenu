<?php
    session_start();
    $userName = $_SESSION['userName'];
    $access_token = $_SESSION['access_token'];
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
    <div id="infoDiv">
        <button type="button" id="kakaoMessageSendBtn" class="btn btn-outline-warning">카카오톡 나에게 보내기</button>
        <span id="infoName"><?= $userName ?> 님</span>
        <button type="button" id="logoutBtn" class="btn-secondary">로그아웃</button>
    </div>
    <hr>
    <div id="menuDiv">
        <button type="button" id="normalMenu" class="btn-primary">일반 메뉴 추천</button>
        <button type="button" id="weatherMenu" class="btn-warning">오늘 날씨 메뉴 추천</button>
    </div>
    <div id="resultDiv" class="container justify-content-center">
        <p id="subTitle" class="justify-content-center">일반 메뉴 추천</p>
        
        

    </div>
    <div id="buttonDiv">
        <button type="button" id="reRecommandBtn" class="btn btn-outline-danger">다시 추천받기</button>
        <button type="button" id="backBtn" class="btn btn-outline-secondary">뒤로가기</button>
    </div>
    <script src="./index.js"></script>
</body>
</html>