<?php
//require_once('otvetNotes.php');
function addNotes($auru,$idadd,$subdomain){
    var_dump('зашли addNotes');
    $text = array(array(
        "entity_id"=>$idadd,
        "note_type"=> "common",
        "params"=>array(
            "text" => $auru->id."\n Товар с AU.RU: ".$auru->itemName.
                "\n Вопрос клиента: ".$auru->quest.
                " \n Дата вопроса: ".$auru->dateCreate.
                " \n Cсылка на товар AU.RU: ".$auru->questionUrl.
            " \n Логин в AU.RU: ".$auru->login,
        )
    )
    );
    var_dump(json_encode($text));
    $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/notes';
    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($text));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $notes = json_decode($out, false);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    getError($code);
    return $notes;
}
//// обработчик ошибок amoCRM
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