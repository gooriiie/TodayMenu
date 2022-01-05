<?php
    session_start();

    $food_list = ['김치찌개', '삼겹살', '칼국수', '햄버거', '짜장면', '짬뽕', '마라탕', '치킨', '국밥', '부대찌개', '피자', '전', '닭발', '돈까스', '쭈꾸미볶음'];

    $recommands = [];

    $client_id = "JvLXAEz3_xsujIHD6_x0";
    $client_secret = "Fot78zA54C";

    $selected = array_rand($food_list);
    $menu = $food_list[$selected];
    $location = "관저동";
    $query = urlencode($location . " " . $menu);

    $shell_string = "curl \"https://openapi.naver.com/v1/search/local.json?query={$query}&display=3&start=1\" -H \"X-Naver-Client-Id: {$client_id}\" -H \"X-Naver-Client-Secret: {$client_secret}\" -v";

    $searchResponse = shell_exec($shell_string);

    $searchResponse_decode = json_decode($searchResponse);

    $result = json_decode($searchResponse) -> items;

    echo "<div class=\"container\">
            <div class=\"row\">
                <div class=\"col-4\">
                    <p class=\"font\">1</p>
                    <div class=\"card text-white bg-primary\">
                        <div class=\"card-header\">
                            {$result[0] -> category}
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$result[0] -> title}</h5>
                            <p class=\"card-text\">{$result[0] -> address}</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-4\">
                    <p class=\"font\">2</p>
                    <div class=\"card text-white bg-primary\">
                    <div class=\"card-header\">
                        {$result[1] -> category}
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{$result[1] -> title}</h5>
                        <p class=\"card-text\">{$result[1] -> address}</p>
                    </div>
                </div>
                </div>
                <div class=\"col-4\">
                    <p class=\"font\">3</p>
                    <div class=\"card text-white bg-primary\">
                    <div class=\"card-header\">
                        {$result[2] -> category}
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{$result[2] -> title}</h5>
                        <p class=\"card-text\">{$result[2] -> address}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>";
    
    do {
        $selected2 = array_rand($food_list);
    } while($selected == $selected2);

    $menu2 = $food_list[$selected2];
    $query2 = urlencode($location . " " . $menu2);

    $shell_string2 = "curl \"https://openapi.naver.com/v1/search/local.json?query={$query2}&display=3&start=1\" -H \"X-Naver-Client-Id: {$client_id}\" -H \"X-Naver-Client-Secret: {$client_secret}\" -v";

    $searchResponse2 = shell_exec($shell_string2);

    $result2 = json_decode($searchResponse2) -> items;

    array_push($recommands, $result);
    array_push($recommands, $result2);

    $_SESSION['recommands'] = $recommands;

    echo "<div class=\"container justify-content-center\">
    <div class=\"row\">
        <div class=\"col-4\">
            <p class=\"font\">1</p>
            <div class=\"card text-white bg-success justify-content-center\">
                <div class=\"card-header\">
                    {$result2[0] -> category}
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">{$result2[0] -> title}</h5>
                    <p class=\"card-text\">{$result2[0] -> address}</p>
                </div>
            </div>
        </div>
        <div class=\"col-4\">
            <p class=\"font\">2</p>
            <div class=\"card text-white bg-success justify-content-center\">
            <div class=\"card-header\">
                {$result2[1] -> category}
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">{$result2[1] -> title}</h5>
                <p class=\"card-text\">{$result2[1] -> address}</p>
            </div>
        </div>
        </div>
        <div class=\"col-4\">
            <p class=\"font\">3</p>
            <div class=\"card text-white bg-success justify-content-center\">
            <div class=\"card-header\">
                {$result2[2] -> category}
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">{$result2[2] -> title}</h5>
                <p class=\"card-text\">{$result2[2] -> address}</p>
            </div>
        </div>
        </div>
    </div>
    </div>";
?>