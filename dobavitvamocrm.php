    <?php
//    require_once('au.php');
    require_once('addNotes.php');
     $rr = 1;
    // данные amo
    $subdomain = 'emomalisharifov98yandexru';
    $login = 'emomali.sharifov98@yandex.ru';
    $hash = 'aba270c13df8682df545519e6dc93135e6c787ff';
    $user=[
        'USER_LOGIN'=>$login,
        'USER_HASH'=>$hash
    ];
    amoAuth($user, $subdomain);
    //addLeads($subdomain);
//    p(allLeads($subdomain));
//    p(addLeads($subdomain));
    function p($input,$die=0)
    {
        echo '<pre>';
        print_r($input);
        echo '</pre>';
        if ($die) {
            die;
        }
    }
//    p(postaddNotes($rr,$subdomain));
    function postaddNotes($auru,$subdomain){
        $idadd = addLeads($auru,$subdomain)->_embedded->items[0]->id;
        var_dump($auru);
        $addNotes = addNotes($auru,$idadd,$subdomain);
        return $addNotes;
    }
    // авторизация
    function amoAuth($user, $subdomain)
    {
        #Формируем ссылку для запроса
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
        getError($code);
        $response=json_decode($out,true);
        $response=$response['response'];

        if(isset($response['auth'])) {#Флаг авторизации доступен в свойстве "auth"
            return true;
        }else {
            return false;
        }

    }
//    function allLeads($subdomain)
//    {
//        $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads';
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
//        getError($code);
//        return $rr;
//    }
    function addLeads($auru,$subdomain)
    {
        $data['add'] = array(
            array(
                'name' => 'AU.RU',
                'created_by'=> 0,
                'price'=> 20000,


            )
        );
//        'notes'=> array(
//        'params' =>array(
//            'text'=> 'Сообщение из AU.RU'
//        )
//    )
    #Формируем ссылку для запроса
        $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/leads';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $rr = json_decode($out, false);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        getError($code);
//        var_dump($rr->_embedded->leads[0]->id);
//        $idnewleads= (int)$rr->_embedded->leads[0]->id;
        return $rr;
    }

    // обработчик ошибок amoCRM
    function getError($code)
    {
        /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
        $code=(int)$code;
        $errors=array(
            301=>'Moved permanently',
            400=>'Bad request',
            401=>'Unauthorized',
            403=>'Forbidden',
            404=>'Not found',
            500=>'Internal server error',
            502=>'Bad gateway',
            503=>'Service unavailable'
        );
        try
        {
            /* Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке */
            if($code!=200 && $code!=204) {
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
            }
        }
        catch(Exception $E)
        {
            die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
        }
    }
