<?php
    session_start();

    $returnCode = $_GET["code"];
    $restAPIKey = "af9606e200b85fb3bd50857f43641a9a";
    $callbackURI = "http://localhost/TermProject/login_callback.php";
    $getTokenURL = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=" . $restAPIKey . "&redirect_uri=" . $callbackURI . "&code=" . $returnCode;
    
    $shell_string = "curl -v -X POST \"https://kauth.kakao.com/oauth/token\" -H \"Content-Type: application/x-www-form-urlencoded\" -d \"grant_type=authorization_code\" -d \"client_id={$restAPIKey}\" --data-urlencode \"redirect_uri={$callbackURI}\" -d \"code={$returnCode}\"";
    
    $loginResponse = shell_exec($shell_string);
    $token_json = json_decode($loginResponse);
    $accessToken = $token_json->access_token;
    
    $shell_string = 'curl -v -X GET https://kapi.kakao.com/v2/user/me -H "Authorization: Bearer ' . $accessToken . '"';
    $profileResponse = shell_exec($shell_string);
    $profile = json_decode($profileResponse);
    echo $profile->properties->nickname . " 님 환영합니다";
    
    $_SESSION['userName'] = $profile->properties->nickname;
    $_SESSION['access_token'] = $accessToken;

    header("Location:./home.php");
?>