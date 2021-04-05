<?php

require_once('dobavitvamocrm.php');
//e4dt27aVuDKLQPJ0szOtagjSFqILJ5xc
//https://market-api.au.ru/v1/auth/token
//$url = 'https://au.ru/login/?returnUrl=https%3A%2F%2Fau.ru%2F';
//https://market-api.au.ru/v1/categories/
//https://market-api.au.ru/v1/items/
//https://market-api.au.ru/v1/me/
///auth/token    login ТЕМАСФО   password 123456Qwe
/// {
//    "token": "MSmbpE0Qom66k1f67QuewJ9lA7uvhIAg" //Аторизационный токен который необходимо передавать в заголовке X-Auth-Token
//}
curlLogin();
function curlLogin(){
    $url = 'https://market-api.au.ru/v1/auth/token/';
    $subdomain = 'emomalisharifov98yandexru';
    $params = array(
        'login' => 'ТЕМАСФО',
        'password' => '123456Qwe',
        'token' =>'e4dt27aVuDKLQPJ0szOtagjSFqILJ5xc',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    $rr = json_decode($result, false);
//    print_r($rr->token);
    $url = 'https://market-api.au.ru/v1/questions/unanswered/';
    $headers = array(
        "X-Auth-Token: $rr->token",
        "Content-Type: application/json",
    );
    $ch = curl_init(); //<- вот тут новый адрес
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    $rr = json_decode($result, false);
    curl_close($ch);
    echo '<pre>';
    $rrr = (array_reverse($rr));
    $monthStart = '2021-03-01T00:00:00.087Z';
//    count($rrr);
    for($i = 0; $i < 4; ++$i) {
        if($rrr[$i]->dateCreate >= $monthStart){
//            echo '<pre>';
//            echo $id = $rrr[$i]->id;
//            echo '<pre>';
//            echo $lotId = $rrr[$i]->lotId;
//            echo '<pre>';
//            echo $userId = $rrr[$i]->userId;
//            echo '<pre>';
//            echo $quest = $rrr[$i]->quest;
//            echo '<pre>';
//            echo $dateCreate = $rrr[$i]->dateCreate;
//            echo '<pre>';
//            echo $login = $rrr[$i]->login;
//            echo '<pre>';
//            echo $itemName = $rrr[$i]->itemName;
//            echo '<pre>';
            var_dump($rrr[$i]);
            echo '<pre>';
            var_dump('проверка $rrr[$i]->dateCreate >= $monthStart');
            var_dump('postaddNotes');
            postaddNotes($rrr[$i]);
        }


//        $query = "INSERT INTO `leads` (id, lotId, userId, quest, dateCreate, login, itemName, questionUrl, id_maneger, answer) VALUES
//        (
//         '$id',
//         '$rrr[$i]->lotId',
//         '$rrr[$i]->userId',
//         '$rrr[$i]->quest',
//         '$rrr[$i]->dateCreate',
//         '$rrr[$i]->login',
//         '$rrr[$i]->itemName',
//         '$rrr[$i]->questionUrl',
//         '0',
//         'answer')";
//        $mysqli->query($query);
//        echo $mysqli->affected_rows;
//        echo $query;
//        echo $mysqli->error;
    }
    return $rr;


}



?>
