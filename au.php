<?php
//e4dt27aVuDKLQPJ0szOtagjSFqILJ5xc
//https://market-api.au.ru/doc.html#auth_token_post
//https://market-api.au.ru/v1/categories/
//https://market-api.au.ru/v1/items/
//https://market-api.au.ru/v1/me/
///auth/token    login ТЕМАСФО   password 123456Qwe
/// {
//    "token": "MSmbpE0Qom66k1f67QuewJ9lA7uvhIAg" //Аторизационный токен который необходимо передавать в заголовке X-Auth-Token
//}

$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => 'https://market-api.au.ru/doc.html#auth_token_post',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query(array(/*здесь массив параметров запроса*/))
));
$response = curl_exec($myCurl);
curl_close($myCurl);

echo "Ответ на Ваш запрос: ".$response;