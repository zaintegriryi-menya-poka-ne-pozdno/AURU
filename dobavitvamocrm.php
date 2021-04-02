<?php
require __DIR__ . '/vendor/autoload.php';
require_once('addLeads.php');

// include_once __DIR__ . '/unsorted/accept.php';
function postaddNotes($auru)
{
//        $host_db= 'localhost';
//        $user_db = 'u0605_u0605727';
//        $password_db = 'Ea4_c44r';
//        $db = 'u0605727_auamoapi';
//        $mysqli = new mysqli($host_db, $user_db, $password_db, $db);
//        if($mysqli->connect_errno){
//            file_put_contents('db_errors.txt', "(".$mysqli->connect_errno.") ".$mysqli->connect_error);
//            echo "(".$mysqli->connect_errno.") ".$mysqli->connect_error;
//        }
//        $mysqli->query("SET NAMES 'utf8'");
//        $query ="SELECT * FROM au";
//        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
//        if ($result){
//            $rows = mysqli_num_rows($result); // количество полученных строк
//            var_dump(" зашли в if (result)");
//            for ($i = 0 ; $i < $rows ; ++$i){
//                $row = mysqli_fetch_row($result);
//                var_dump($row);
//                if ($row[2] == $auru->userId) {
//                    var_dump("Такой уже есть! auru->userId". $auru->userId);
//                    return true;
//                    if ($row[1] == $auru->lotId) {
//                        var_dump("Такой уже есть! auru->lotId".$auru->lotId);
//                        return true;
//                        if ($row[0] == $auru->id) {
//                            var_dump("Такой уже есть! auru->id".$auru->id);
//                            return true;
//                        }
//                        else{
//                            var_dump("Нет! auru->id".$auru->id);
//                            $query = "INSERT INTO `au` (`id`, `lotId`, `userId`, `quest`, `login`, `itemName`, `questionUrl`, `dateCreate`) VALUES
//                    ('$auru->id', '$auru->lotId', '$auru->userId','$auru->quest','$auru->login','$auru->itemName','$auru->questionUrl','$auru->dateCreate')";
//                            $mysqli->query($query);
//                            return false;
//                        }
//                    }
//                    else{
//                        var_dump("Нет! auru->lotId".$auru->lotId);
//                        $query = "INSERT INTO `au` (`id`, `lotId`, `userId`, `quest`, `login`, `itemName`, `questionUrl`, `dateCreate`) VALUES
//                    ('$auru->id', '$auru->lotId', '$auru->userId','$auru->quest','$auru->login','$auru->itemName','$auru->questionUrl','$auru->dateCreate')";
//                        $mysqli->query($query);
//                        return false;
//                    }
//                }
//                else{
//                    $query = "INSERT INTO `au` (`id`, `lotId`, `userId`, `quest`, `login`, `itemName`, `questionUrl`, `dateCreate`) VALUES
//                    ('$auru->id', '$auru->lotId', '$auru->userId','$auru->quest','$auru->login','$auru->itemName','$auru->questionUrl','$auru->dateCreate')";
//                    $mysqli->query($query);
//                    return false;
//                }
//            }
//            mysqli_free_result($result);
//        }
    var_dump('postaddNotes');
    var_dump($auru);
    var_dump('auru');
    var_dump(addLeads($auru));
    var_dump('вышли с addLeads');
//        var_dump($idadd+ "  Это $idadd");
//        $idgetNotes = getNotes($idadd,$subdomain);
//        var_dump($idgetNotes+ "  Это $idgetNotes");
//        var_dump($idadd.' $idadd');
    var_dump('addNotes');
//        addNotes($auru,$idadd,$subdomain);
    return true;
}


//    // создаем лида
//    $lead = $amo->lead;
//    $lead['name'] = $_POST['product_name'];
//    // $lead['responsible_user_id'] = 2462338; // ID ответсвенного
//    // $lead['pipeline_id'] = 1207249; // ID воронки
//
//    // $lead->addCustomField(305117, [ // ID  поля в которое будт приходить заявки
//    //     [$_POST['city']], // сюда вписать значение из атрибута "name" пример: <input name="phone">
//    // ]);
//
//    $id = $lead->apiAdd();
//
//    // Получение экземпляра модели для работы с контактами
//    $contact = $amo->contact;
//
//    // Заполнение полей модели
//    $contact['name'] = isset($_POST['name']) ? $_POST['name'] : 'Не указано';
//    $contact['linked_leads_id'] = [(int)$id];
//
//    $contact->addCustomField(305117, [
//        [$_POST['city']],
//    ]);
//
//    $contact->addCustomField(304033, [
//        [$_POST['email'], 'PRIV'],
//    ]);
//
//
//
//    // Добавление нового контакта и получение его ID
//    $id = $contact->apiAdd();

////    require_once('au.php');
//    require_once('addNotes.php');
//     $rr = 1;
//    // данные amo
//    $subdomain = 'emomalisharifov98yandexru';
//    $login = 'emomali.sharifov98@yandex.ru';
//    $hash = 'aba270c13df8682df545519e6dc93135e6c787ff';
//    $user=[
//        'USER_LOGIN'=>$login,
//        'USER_HASH'=>$hash
//    ];
//    amoAuth($user, $subdomain);
//    //addLeads($subdomain);
////    p(allLeads($subdomain));
////    p(addLeads($subdomain));
////    allLeads($subdomain);
//    function p($input,$die=0)
//    {
//        echo '<pre>';
//        print_r($input);
//        echo '</pre>';
//        if ($die) {
//            die;
//        }
//    }
////    p(postaddNotes($rr,$subdomain));
//    function postaddNotes($auru,$subdomain){
//        var_dump('postaddNotes');
////        $host_db= 'localhost';
////        $user_db = 'u0605_u0605727';
////        $password_db = 'Ea4_c44r';
////        $db = 'u0605727_auamoapi';
////        $mysqli = new mysqli($host_db, $user_db, $password_db, $db);
////        if($mysqli->connect_errno){
////            file_put_contents('db_errors.txt', "(".$mysqli->connect_errno.") ".$mysqli->connect_error);
////            echo "(".$mysqli->connect_errno.") ".$mysqli->connect_error;
////        }
////        $mysqli->query("SET NAMES 'utf8'");
////        $query ="SELECT * FROM au";
////        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
////        if ($result){
////            $rows = mysqli_num_rows($result); // количество полученных строк
////            var_dump(" зашли в if (result)");
////            for ($i = 0 ; $i < $rows ; ++$i){
////                $row = mysqli_fetch_row($result);
////                var_dump($row);
////                if ($row[2] == $auru->userId) {
////                    var_dump("Такой уже есть! auru->userId". $auru->userId);
////                    return true;
////                    if ($row[1] == $auru->lotId) {
////                        var_dump("Такой уже есть! auru->lotId".$auru->lotId);
////                        return true;
////                        if ($row[0] == $auru->id) {
////                            var_dump("Такой уже есть! auru->id".$auru->id);
////                            return true;
////                        }
////                        else{
////                            var_dump("Нет! auru->id".$auru->id);
////                            $query = "INSERT INTO `au` (`id`, `lotId`, `userId`, `quest`, `login`, `itemName`, `questionUrl`, `dateCreate`) VALUES
////                    ('$auru->id', '$auru->lotId', '$auru->userId','$auru->quest','$auru->login','$auru->itemName','$auru->questionUrl','$auru->dateCreate')";
////                            $mysqli->query($query);
////                            return false;
////                        }
////                    }
////                    else{
////                        var_dump("Нет! auru->lotId".$auru->lotId);
////                        $query = "INSERT INTO `au` (`id`, `lotId`, `userId`, `quest`, `login`, `itemName`, `questionUrl`, `dateCreate`) VALUES
////                    ('$auru->id', '$auru->lotId', '$auru->userId','$auru->quest','$auru->login','$auru->itemName','$auru->questionUrl','$auru->dateCreate')";
////                        $mysqli->query($query);
////                        return false;
////                    }
////                }
////                else{
////                    $query = "INSERT INTO `au` (`id`, `lotId`, `userId`, `quest`, `login`, `itemName`, `questionUrl`, `dateCreate`) VALUES
////                    ('$auru->id', '$auru->lotId', '$auru->userId','$auru->quest','$auru->login','$auru->itemName','$auru->questionUrl','$auru->dateCreate')";
////                    $mysqli->query($query);
////                    return false;
////                }
////            }
////            mysqli_free_result($result);
////        }
//        $idadd = addLeads($auru,$subdomain);
//        var_dump($idadd);
//        var_dump('$idadd');
////        var_dump($idadd+ "  Это $idadd");
////        $idgetNotes = getNotes($idadd,$subdomain);
////        var_dump($idgetNotes+ "  Это $idgetNotes");
////        var_dump($idadd.' $idadd');
//        var_dump('addNotes');
////        addNotes($auru,$idadd,$subdomain);
//        return $idadd;
//    }
//    // авторизация
//    function amoAuth($user, $subdomain)
//    {
//        #Формируем ссылку для запроса
//        $link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
//        // p($user);
//        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
//        #Устанавливаем необходимые опции для сеанса cURL
//        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
//        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
//        curl_setopt($curl,CURLOPT_URL,$link);
//        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
//        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
//        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
//        curl_setopt($curl,CURLOPT_HEADER,false);
//        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
//        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
//        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
//        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
//        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
//        curl_close($curl); #Завершаем сеанс cURL
//        getError($code);
//        $response=json_decode($out,true);
//        $response=$response['response'];
//
//        if(isset($response['auth'])) {#Флаг авторизации доступен в свойстве "auth"
//            return true;
//        }else {
//            return false;
//        }
//
//    }
////    function allLeads($subdomain)
////    {
////        $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads';
////        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
////        #Устанавливаем необходимые опции для сеанса cURL
////        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
////        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
////        curl_setopt($curl,CURLOPT_URL,$link);
////        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
////        curl_setopt($curl,CURLOPT_HTTPHEADER,array(
////            'X-Requested-With: XMLHttpRequest',
////        ));
////        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
////        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
////        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
////        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
////        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
////        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
////        $rr = json_decode($out, false);
////        curl_close($curl); #Завершаем сеанс cURL
////        getError($code);
////        var_dump($rr);
////        var_dump('allLeads');
////        return $rr;
////    }
//    function addLeads($auru,$subdomain)
//    {
//        $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/leads';
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
//        $allleads = json_decode($out, false);
//        curl_close($curl); #Завершаем сеанс cURL
//        getError($code);
//        var_dump($allleads);
//        for ($i = 0; $i <= count($allleads->_embedded->leads); ++$i) {
//            $idvcrm = (substr($allleads->_embedded->leads[$i]->name, 5, -8));
//            $useridvcrmintval = (int)($idvcrm);
//            $idLotvcrm = (substr($allleads->_embedded->leads[$i]->name, -8));
//            $lotidvcrmintval = (int)($idLotvcrm);
//            if (($useridvcrmintval == $auru->userId)) {
//                if ($lotidvcrmintval == $auru->lotId) {
//                    $idleadforgetnotes = $allleads->_embedded->leads[$i]->id;
//                    var_dump($idleadforgetnotes);
//                    $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/' . $idleadforgetnotes . '/notes';
//                    $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
//                    #Устанавливаем необходимые опции для сеанса cURL
//                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
//                    curl_setopt($curl, CURLOPT_URL, $link);
//                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
//                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//                        'X-Requested-With: XMLHttpRequest',
//                    ));
//                    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
//                    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
//                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//                    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//                    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
//                    $getNotesLeads = json_decode($out, false);
//                    curl_close($curl); #Завершаем сеанс cURL
//                    getError($code);
//                    var_dump($getNotesLeads);
//                    var_dump('$getNotesLeads');
////                    var_dump($getNotesLeads->_embedded->notes->params->text);
//                    if ($getNotesLeads->_embedded->notes != null) {
//                        $flagnotes = false;
//                        for ($i = 0; $i <= count($getNotesLeads->_embedded->notes); ++$i) {
//                            $getIdLeads = $getNotesLeads->_embedded->notes[$i]->entity_id;
////                      $getNotesText = $getNotesLeads->_embedded->notes[$i]->id;
//                            $getidNotesCRM = (int)(substr($getNotesLeads->_embedded->notes[$i]->params->text, 0, 8));
//                            $getidNotesAU = $auru->id;
//                            var_dump($getidNotesCRM);
//                            var_dump('$getidNotesCRM');
//                            var_dump($getidNotesAU);
//                            var_dump('$getidNotesAU');
//                            if ($getidNotesCRM == $getidNotesAU) {
//                                $flagnotes = true;
//                            } else {
//                                var_dump($idleadforgetnotes);
//                                var_dump('$idleadforgetnotes');
//                                $flagnotes = false;
//                            }
//                        }
//                        addNotes($auru,$idleadforgetnotes,$subdomain);
//                    }
//                }
//                else{
//                    $data['add'] = array(
//                        array(
//                            'name' => 'AU.RU ' . $auru->userId . ',' . $auru->lotId,
//                            'created_by' => 0,
//                            'price' => 0,
////                        'status_id'=>38572759,
////                        'pipeline_id' => 4073713
//                        )
//                    );
//                    #Формируем ссылку для запроса
//                    $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/leads';
//                    $curl = curl_init();
//                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
//                    curl_setopt($curl, CURLOPT_URL, $link);
//                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
//                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//                    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//                    curl_setopt($curl, CURLOPT_HEADER, false);
//                    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
//                    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
//                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//                    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//                    $rr = json_decode($out, false);
//                    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//                    getError($code);
//                    addNotes($auru,$rr->_embedded->items[0]->id,$subdomain);
//                    return true;
//                }
//
//            } else {
//                $data['add'] = array(
//                    array(
//                        'name' => 'AU.RU ' . $auru->userId . ',' . $auru->lotId,
//                        'created_by' => 0,
//                        'price' => 0,
////                        'status_id'=>38572759,
////                        'pipeline_id' => 4073713
//                    )
//                );
//                #Формируем ссылку для запроса
//                $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/leads';
//                $curl = curl_init();
//                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
//                curl_setopt($curl, CURLOPT_URL, $link);
//                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
//                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//                curl_setopt($curl, CURLOPT_HEADER, false);
//                curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
//                curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
//                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//                $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
//                $rr = json_decode($out, false);
//                $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//                getError($code);
//                addNotes($auru,$rr->_embedded->items[0]->id,$subdomain);
//                return true;
//            }
//        }
//    }
//
////    function addLeads($auru,$subdomain)
////    {
////        $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads';
////        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
////        #Устанавливаем необходимые опции для сеанса cURL
////        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
////        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
////        curl_setopt($curl,CURLOPT_URL,$link);
////        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'GET');
////        curl_setopt($curl,CURLOPT_HTTPHEADER,array(
////            'X-Requested-With: XMLHttpRequest',
////        ));
////        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
////        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
////        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
////        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
////        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
////        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
////        $allleads = json_decode($out, false);
////        curl_close($curl); #Завершаем сеанс cURL
////        getError($code);
////        for ($i = 0; $i <= count($allleads->_embedded->leads); ++$i) {
////            $idvcrm = (substr($allleads->_embedded->leads[$i]->name, 5, -8));
////            $useridvcrmintval = (int)($idvcrm);
////            $idLotvcrm = (substr($allleads->_embedded->leads[$i]->name, -8));
////            $lotidvcrmintval = (int)($idLotvcrm);
////            if (($useridvcrmintval == $auru->userId) && ($lotidvcrmintval == $auru->lotId)) {
////                $idleadforgetnotes = $allleads->_embedded->leads[$i]->id;
////                var_dump($idleadforgetnotes);
////                $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/' . $idleadforgetnotes . '/notes';
////                $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
////                #Устанавливаем необходимые опции для сеанса cURL
////                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
////                curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
////                curl_setopt($curl, CURLOPT_URL, $link);
////                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
////                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
////                    'X-Requested-With: XMLHttpRequest',
////                ));
////                curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
////                curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
////                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
////                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
////                $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
////                $code = curl_getinfo($curl, CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
////                $getNotesLeads = json_decode($out, false);
////                curl_close($curl); #Завершаем сеанс cURL
////                getError($code);
////                var_dump($getNotesLeads);
////                var_dump('$getNotesLeads');
//////                    var_dump($getNotesLeads->_embedded->notes->params->text);
////                if ($getNotesLeads->_embedded->notes != null) {
////                    for ($i = 0; $i <= count($getNotesLeads->_embedded->notes); ++$i) {
////                        $getIdLeads = $getNotesLeads->_embedded->notes[$i]->entity_id;
//////                      $getNotesText = $getNotesLeads->_embedded->notes[$i]->id;
////                        $getidNotesCRM = (int)(substr($getNotesLeads->_embedded->notes[$i]->params->text, 0, 8));
////                        $getidNotesAU = $auru->id;
////                        var_dump($getidNotesCRM);
////                        var_dump('$getidNotesAU');
////                        var_dump($getidNotesAU);
////                        var_dump('$getidNotesAU');
////                        if ($getidNotesCRM == $getidNotesAU) {
////                            return true;
////                        } else {
////                            var_dump($idleadforgetnotes);
////                            var_dump('$idleadforgetnotes');
////                            return $idleadforgetnotes;
////                        }
////                    }
////                }
////                return $allleads->_embedded->leads[$i]->id;
////            } else {
////                $data['add'] = array(
////                    array(
////                        'name' => 'AU.RU ' . $auru->userId . ',' . $auru->lotId,
////                        'created_by' => 0,
////                        'price' => 0,
//////                        'status_id'=>38572759,
//////                        'pipeline_id' => 4073713
////                    )
////                );
////                #Формируем ссылку для запроса
////                $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/leads';
////                $curl = curl_init();
////                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
////                curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
////                curl_setopt($curl, CURLOPT_URL, $link);
////                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
////                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
////                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
////                curl_setopt($curl, CURLOPT_HEADER, false);
////                curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
////                curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
////                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
////                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
////                $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
////                $rr = json_decode($out, false);
////                $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
////                getError($code);
////                return $rr->_embedded->items[0]->id;
////            }
////        }
////    }
//
//    // обработчик ошибок amoCRM
//    function getError($code)
//    {
//        /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
//        $code=(int)$code;
//        $errors=array(
//            301=>'Moved permanently',
//            400=>'Bad request',
//            401=>'Unauthorized',
//            403=>'Forbidden',
//            404=>'Not found',
//            500=>'Internal server error',
//            502=>'Bad gateway',
//            503=>'Service unavailable'
//        );
//        try
//        {
//            /* Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке */
//            if($code!=200 && $code!=204) {
//                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
//            }
//        }
//        catch(Exception $E)
//        {
//            die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
//        }
//    }
