<?php
//require_once('dobavitvamocrm.php');
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
//$rr = 1;
//// данные amo
//$subdomain = 'emomalisharifov98yandexru';
//$login = 'emomali.sharifov98@yandex.ru';
//$hash = 'aba270c13df8682df545519e6dc93135e6c787ff';
//$user=[
//    'USER_LOGIN'=>$login,
//    'USER_HASH'=>$hash
//];
//amoAuth($user, $subdomain);
////addLeads($subdomain);
//    p(getNotes($subdomain));
////    p(addLeads($subdomain));
//function p($input,$die=0)
//{
//    echo '<pre>';
//    print_r($input);
//    echo '</pre>';
//    if ($die) {
//        die;
//    }
//}
////    p(postaddNotes($rr,$subdomain));
//function postaddNotes($auru,$subdomain){
//    $idadd = addLeads($auru,$subdomain)->_embedded->items[0]->id;
//    $addNotes = addNotes($auru,$idadd,$subdomain);
//    return $addNotes;
//}
//// авторизация
//function amoAuth($user, $subdomain)
//{
//    #Формируем ссылку для запроса
//    $link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
//    // p($user);
//    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
//    #Устанавливаем необходимые опции для сеанса cURL
//    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
//    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
//    curl_setopt($curl,CURLOPT_URL,$link);
//    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
//    curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
//    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
//    curl_setopt($curl,CURLOPT_HEADER,false);
//    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
//    curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
//    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
//    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
//    $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//    $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
//    curl_close($curl); #Завершаем сеанс cURL
//    getError($code);
//    $response=json_decode($out,true);
//    $response=$response['response'];
//
//    if(isset($response['auth'])) {#Флаг авторизации доступен в свойстве "auth"
//        return true;
//    }else {
//        return false;
//    }
//
//}
//    function getNotes($idadd,$subdomain)
//    {
//        var_dump($idadd);
//        $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/'.$idadd.'/notes';
//        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
//        #Устанавливаем необходимые опции для сеанса cURL
//        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
//        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
//        curl_setopt($curl,CURLOPT_URL,$link);
//        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
//        curl_setopt($curl,CURLOPT_HTTPHEADER,array(
//            'X-Requested-With: XMLHttpRequest',
//        ));
//        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
//        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
//        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
//        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
//        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
//        $rr = json_decode($out, false);
//        curl_close($curl); #Завершаем сеанс cURL
////        getError($code);
//        var_dump($rr);
//        return $rr;
//    }
//    p(curlLogin());
//function p($input,$die=0)
//{
//    echo '<pre>';
//    print_r($input);
//    echo '</pre>';
//    if ($die) {
//        die;
//    }
//}
//function curlLogin(){
//    $url = 'https://market-api.au.ru/v1/auth/token/';
//    $subdomain = 'emomalisharifov98yandexru';
//    $params = array(
//        'login' => 'ТЕМАСФО',
//        'password' => '123456Qwe',
//        'token' =>'e4dt27aVuDKLQPJ0szOtagjSFqILJ5xc',
//    );
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
//    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
//    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//    $result = curl_exec($ch);
//    $rr = json_decode($result, false);
////    print_r($rr->token);
//    $url = 'https://market-api.au.ru/v1/questions/answer/';
//    $text = array(
//        "questionId"=>20030047,
//        "answer"=> "Ответ менеджера",
//    );
//    $headers = array(
//        "X-Auth-Token: $rr->token",
//        "Content-Type: application/json",
//    );
//    var_dump(json_encode($text));
//    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
//    #Устанавливаем необходимые опции для сеанса cURL
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
//    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($text));
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
//    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//    $rr = json_decode($out, false);
//    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//    return $rr;
//
//}



?>
