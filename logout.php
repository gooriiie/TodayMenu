<?php
    session_start();

    $accessToken = $_SESSION['access_token'];


    $shell_string = "curl -v -X POST \"https://kapi.kakao.com/v1/user/logout\" -H \"Content-Type: application/x-www-form-urlencoded\" -H \"Authorization: Bearer {$accessToken}\"";

    $logoutResponse = shell_exec($shell_string);

    session_unset();
?>