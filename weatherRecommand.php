<!-- callback url : http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst? -->

<!-- 
요청 메시지 명세
serviceKey : 인증키
dataType : 응답자료 형식
base_date : 발표일자
base_time : 발표시각
nx : 예보지점 x 좌표
ny : 예보지점 y 좌표
-->

<?php
    $service_key = "iFFARwoOmRr1kpJYMuoltxYEbOjjtCfYfrQxxQ3%2BMK6n975FVo%2FkMqLAN8eIxJ%2BSuRh19lsxOpfqYshaploEeQ%3D%3D";
    $today = date("Y-m-d H:i:s");
    $base_date = date("Y-m-d");
    // $base_date = date("Y-m-d", strtotime("-1 day", $base_date));
    $base_time = date("H:i:s");

    $nx = 66;
    $ny = 99;

    $payload = "serviceKey=" . $service_key . "&numOfRows=10" . "&pageNo=1" . "&dataType=json" . "&base_date=20211210" . "&base_time=0800" . "&nx=" . $nx . "&ny=" . $ny;

    $url = "http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst?";
    $url .= ("serviceKey=" . $service_key);
    $url .= ("&" . urlencode("numOfRows=10"));
    $url .= ("&" . urlencode("pageNo=1"));
    $url .= ("&" . urlencode("dataType=json"));
    $url .= ("&" . urlencode("base_date=20211210"));
    $url .= ("&" . urlencode("base_time=0800"));
    $url .= ("&" . urlencode("nx=") . urlencode($nx));
    $url .= ("&" . urlencode("ny=") . urlencode($ny));


    $method = "GET";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    $response = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    echo $response;
?>