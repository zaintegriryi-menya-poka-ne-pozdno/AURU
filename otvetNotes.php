<?php
logger($_POST);

function logger($msg, $prefix='')
{
    $name = str_replace('.php', '', array_pop(explode('/',$_SERVER['SCRIPT_NAME'])));
    $ovetmeneger = (string)($msg['leads']['note'][0]['note']['text']);
    $idsdelki = (int)($msg['leads']['note'][0]['note']['element_id']);
    $account_idmanagera = (int)($msg['leads']['note'][0]['note']['account_id']);
    $idmenegera = (int)($msg['leads']['note'][0]['note']['created_by']);
    $idvAU = (int)(substr(($msg['leads']['update'][0]['name']),-8));
    $leads = $msg['leads'];
    $notes = $msg['notes'];
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $ovetmeneger,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idsdelki,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $account_idmanagera,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idmenegera,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idvAU,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $leads,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $notes,true).PHP_EOL, FILE_APPEND);
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $msg,true).PHP_EOL, FILE_APPEND);

    $subdomain = 'testtset122';
    $login = 'testtset122@yandex.ru';
    $hash = 'e0c8ac87c24805e334cf7e786533806d71bed262';
    $user=[
        'USER_LOGIN'=>$login,
        'USER_HASH'=>$hash
    ];
    $link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
    // p($user);
    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL,$link);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER,false);
    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
    curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
    curl_close($curl); #Завершаем сеанс cURL
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $out,true).PHP_EOL, FILE_APPEND);
    $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/'.$idsdelki.'';
    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL,$link);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt($curl,CURLOPT_HTTPHEADER,array(
        'X-Requested-With: XMLHttpRequest',
    ));
    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
    curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
    $leads = json_decode($out, false);
    curl_close($curl); #Завершаем сеанс cURL
    file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $leads,true).PHP_EOL, FILE_APPEND);
    $idvAU = (int)(substr($leads->name, -8));
    if($idmenegera == 6912532){
        file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idvAU,true).PHP_EOL, FILE_APPEND);
        file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idmenegera,true).PHP_EOL, FILE_APPEND);
        curlLogin($idvAU,$ovetmeneger,$idmenegera);
    }
}
$ovetmeneger = (string)($_POST['leads']['note'][0]['note']['text']);
$idsdelki = (int)($_POST['leads']['note'][0]['note']['element_id']);
$account_idmanagera = (int)($_POST['leads']['note'][0]['note']['account_id']);
$idmenegera = (int)($_POST['leads']['note'][0]['note']['created_by']);
$idvAU = (int)(substr(($_POST['leads']['update'][0]['name']), -8));
//file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $ovetmeneger,true).PHP_EOL, FILE_APPEND);
//file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idsdelki,true).PHP_EOL, FILE_APPEND);
//file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $account_idmanagera,true).PHP_EOL, FILE_APPEND);
//file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idmenegera,true).PHP_EOL, FILE_APPEND);
//file_put_contents('log_'.$prefix.$name.'_'.date('md').'.txt', print_r( $idvAU,true).PHP_EOL, FILE_APPEND);

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
function curlLogin($idvAU,$ovetmeneger,$idmenegera)
{

    if ($idmenegera == 6912532) {
        $prefix = '';
        $url = 'https://market-api.au.ru/v1/auth/token/';
        $params = array(
            'login' => 'ТЕМАСФО',
            'password' => '123456Qwe',
            'token' => 'e4dt27aVuDKLQPJ0szOtagjSFqILJ5xc',
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
        file_put_contents('log_' . $prefix . $name . '_' . date('md') . '.txt', print_r($rr, true) . PHP_EOL, FILE_APPEND);
//    print_r($rr->token);
        $url = 'https://market-api.au.ru/v1/questions/answer/';
        $text = array(
            "questionId" => $idvAU,
            "answer" => $ovetmeneger,
        );
        $headers = array(
            "X-Auth-Token: $rr->token",
            "Content-Type: application/json",
        );
        var_dump(json_encode($text));
        $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
        #Устанавливаем необходимые опции для сеанса cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($text));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $rr = json_decode($out, false);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        file_put_contents('log_' . $prefix . $name . '_' . date('md') . '.txt', print_r($rr, true) . PHP_EOL, FILE_APPEND);
        file_put_contents('log_' . $prefix . $name . '_' . date('md') . '.txt', print_r($code, true) . PHP_EOL, FILE_APPEND);
        return $rr;

    }
}
?>
