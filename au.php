<?php
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
function curlLogin(){
    $url = 'https://market-api.au.ru/v1/auth/token/';
    $params = array(
        'login' => 'ТЕМАСФО',
        'password' => '123456Qwe',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    // Или предать массив строкой:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));

    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $result = curl_exec($ch);
    curl_close($ch);

    echo $result;

}
curlLogin();

