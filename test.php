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
        echo '<pre>';
        var_dump("lotId уже есть");
        var_dump($amo->task->apiList([
            'type' => 'lead',
            'limit_rows' => 10,
        ]));

    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }
