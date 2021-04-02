<?php
require __DIR__ . '/vendor/autoload.php';
$url = 'https://market-api.au.ru/v1/auth/token/';
$subdomain = 'emomalisharifov98yandexru';
    try {
        // Создание клиента
        $subdomain = 'testtset122';            // Поддомен в амо срм
        $login = 'testtset122@yandex.ru';            // Логин в амо срм
        $apikey = 'e0c8ac87c24805e334cf7e786533806d71bed262';       // api ключ
        $amo = new \AmoCRM\Client($subdomain, $login, $apikey);

        var_dump("lotId уже есть");
        $parameters = [
            'type' => 'lead',
            'element_id' => 2831699
        ];
        $notes = $amo->note;
        $idnotes = $notes->apiList($parameters);
        echo '<pre>';
        print_r($idnotes);
        print_r("id v notes->apiList");
        print_r(count($idnotes));

    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }
