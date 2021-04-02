<?php
require_once ('vendor/autoload.php');
$url = 'https://market-api.au.ru/v1/auth/token/';
    try {
        $menegers = [2375176, 2320036, 2375017, 3067300, 3067321, 6512170];
//        $subdomain = 'tema24';            // Поддомен в амо срм
//        $login = '666@2810101.ru';            // Логин в амо срм
//        $apikey = 'ced8d14801596715d8b197956c30b6be13612412';       // api ключ
//        $amo = new \AmoCRM\Client($subdomain, $login, $apikey);
//        $parameters = [
//            'type' => 'lead',
//            'element_id' => 23627817
//        ];
//        $notes = $amo->note;
//        $idnotes = $notes->apiList($parameters);
//        $parameterss = [
//            'id' => 23627817
//        ];
//        $lead = $amo->lead;
//        $id = $lead->apiList($parameterss);
//        echo '<pre>';
//        print_r($id);
//        echo '<pre>';
//        print_r($idnotes);
//        print_r("id v notes->apiList");
        print_r($menegers);
        $id = array_rand($menegers,1);
        $idmanager = (int)$menegers[$id];
        print_r($idmanager);


    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }
