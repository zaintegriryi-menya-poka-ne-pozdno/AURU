<?php
//require_once('otvetNotes.php');
function addNotes($lead,$auru,$amo){
        $note = $amo->note;
        $note['element_id'] = $lead;
        $note['element_type'] = 2; // 1 - contact, 2 - lead
        $note['note_type'] = \AmoCRM\Models\Note::COMMON; // @see https://developers.amocrm.ru/rest_api/notes_type.php
        $note['text'] = "Товар с AU.RU: ".$auru->itemName.
            "\n Вопрос клиента: ".$auru->quest.
            " \n Cсылка на товар AU.RU: ".$auru->questionUrl.
            " \n Логин в AU.RU: ".$auru->login.
        " \n Дата вопроса: ".$auru->dateCreate;
        $id = $note->apiAdd();
        $task = $amo->task;
        $task->debug(true); // Режим отладки
        $task['element_id'] = $lead;
        $task['element_type'] = 2;
        $task['task_type'] = "CALL";
        $task['text'] = "Ответить на вопрос с AU.RU";
//        $task['responsible_user_id'] = 6912532;
//        $task['complete_till'] = '+1 DAY';
        $idt = $task->apiAdd();
        print_r($id);
        return $id;
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