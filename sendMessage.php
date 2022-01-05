<?php
    session_start();

    $access_token = $_SESSION['access_token'];

    $recommands = $_SESSION['recommands'];

    // $shell_string = "curl -v -X POST \"https://kapi.kakao.com/v2/api/talk/memo/default/send\" -H \"Content-Type: application/x-www-form-urlencoded\" -H \"Authorization: Bearer {$access_token}\" --data-urlencode \"template_object={\"object_type\": \"list\", \"header_title\": \"오늘의 메뉴 추천\", \"header_link\": {\"web_url\": \"http://www.naver.com\", \"mobile_web_url\": \"http://m.naver.com\", \"android_execution_params\": \"main\", \"ios_execution_params\": \"main\"}\", \"contents\": [{\"title\": \"{$recommands[0][0] -> category}{$recommands[0][0] -> title}\", \"description\": \"{$recommands[0][0] -> description}\", \"image_url\": \"http://mud-kage.kakao.co.kr/dn/QNvGY/btqfD0SKT9m/k4KUlb1m0dKPHxGV8WbIK1/openlink_640x640s.jpg\", \"image_width\": 50, \"image_height\": 50, \"link\": {\"web_url\": \"https://search.naver.com/search.naver?\", \"mobile_web_url\": \"http://search.naver.com/search.naver?\", \"android_execution_params\": \"/contents/1\", \"ios_execution_params\": \"/contents/1}}], \"buttons\": [{\"title\": \"웹으로 이동\", \"link\": {\"web_url\": \"http://www.naver.com\", \"mobile_web_url\": \"http://m.naver.com}}, {\"title\": \"앱으로 이동\", \"link\": {\"android_execution_params\": \"main\", \"ios_execution_params\": \"main\"}}]}\"";
    $shell_string = "curl -v -X POST \"https://kapi.kakao.com/v2/api/talk/memo/default/send\" -H \"Content-Type: application/x-www-form-urlencoded\" -H \"Authorization: Bearer {$access_token}\" --data-urlencode 
    \"template_object={
        \"object_type\": \"list\",
        \"header_title\": \"오늘의 메뉴 추천\",
        \"header_link\": \"{
            \"web_url\": \"http://www.naver.com\",
            \"mobile_web_url\": \"http://m.naver.com\",
            \"android_execution_params\": \"main\",
            \"ios_execution_params\": \"main\"
        }\",
        \"contents\": \"[
            \"{
                \"title\": \"{$recommands[0][0] -> category}{$recommands[0][0] -> title}\",
                \"description\": \"{$recommands[0][0] -> description}\",
                \"image_url\": \"http://mud-kage.kakao.co.kr/dn/QNvGY/btqfD0SKT9m/k4KUlb1m0dKPHxGV8WbIK1/openlink_640x640s.jpg\",
                \"image_width\": 50,
                \"image_height\": 50,
                \"link\": \"{
                    \"web_url\": \"https://search.naver.com/search.naver?\",
                    \"mobile_web_url\": \"http://search.naver.com/search.naver?\",
                    \"android_execution_params\": \"/contents/1\",
                    \"ios_execution_params\": \"/contents/1\"
                }\"
            }\"
            
        ]\",
        \"buttons\": \"[
            \"{
                \"title\": \"웹으로 이동\",
                \"link\": \"{
                    \"web_url\": \"http://www.naver.com\",
                    \"mobile_web_url\": \"http://m.naver.com\"
                }\"
            }\",
            \"{
                \"title\": \"앱으로 이동\",
                \"link\": \"{
                    \"android_execution_params\": \"main\",
                    \"ios_execution_params\": \"main\"
                }\"
            }\"
        ]\"
    }\"";

    $sendResponse = shell_exec($shell_string);
    $sendResponse = json_decode($sendResponse);
    echo gettype($sendResponse);

    if($sendResponse -> result_code == 0){
        echo "메세지를 성공적으로 보냈습니다.";
    }
    else{
        echo "메세지 전송에 실패했습니다.";
    }

?>