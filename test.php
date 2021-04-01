<?php
require __DIR__ . '/vendor/autoload.php';
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
for($i = 0; $i < 2; ++$i) {
    try {
        // Создание клиента
        $subdomain = 'testtset122';            // Поддомен в амо срм
        $login = 'testtset122@yandex.ru';            // Логин в амо срм
        $apikey = 'e0c8ac87c24805e334cf7e786533806d71bed262';       // api ключ
        $amo = new \AmoCRM\Client($subdomain, $login, $apikey);

        $parameters = [
            'type' => 'lead',
            'element_id' => 2738825
        ];
        $notes = $amo->note;
        $idnotes = $notes->apiList($parameters);
        print_r($idnotes);
        echo '<pre>';
        $data = (substr($idnotes[1]['text'], -24));
        print_r($data);
        echo '<pre>';
        print_r($idnotes[1]['text']);

    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }
    if ($rrr[$i]->dateCreate==$data){
        var_dump("dateCreate");
    }

}
