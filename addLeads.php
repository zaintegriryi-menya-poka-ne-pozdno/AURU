<?php
require_once('addNotes.php');
function addLeads($auru)
{
    try {
        // Создание клиента
        $subdomain = 'testtset122';            // Поддомен в амо срм
        $login = 'testtset122@yandex.ru';            // Логин в амо срм
        $apikey = 'e0c8ac87c24805e334cf7e786533806d71bed262';       // api ключ
        $amo = new \AmoCRM\Client($subdomain, $login, $apikey);
        // Вывести полученые из амо данные
        // echo '<pre>';
        // print_r($amo->account->apiCurrent());
        // echo '</pre>';
        // список лида
        $parameters = [
            'pipeline_id' => 4143913,
            'status' => 39069232
        ];
        $lead = $amo->lead;
        $id = $lead->apiList($parameters);
        print_r($id);
        print_r("id v addLeads");
//        print_r($id[0]['name']);
        print_r(count($id));
        for($i = 0; $i < count($id); ++$i) {
            $iduservcrm[$i] = (int)(substr($id[$i]['name'], 5, -16));
            $idLotvcrm[$i] = (int)(substr($id[$i]['name'], 13, -9));
            $idvcrm[$i] = (int)(substr($id[$i]['name'], -8));
        }
        var_dump($iduservcrm);
        var_dump($idvcrm);
        var_dump($idLotvcrm);
        print_r($auru);
        if (in_array($auru->userId, $iduservcrm, true)) {
            var_dump("userId уже есть");
            $iduservcrm1 = array_search($auru->userId, $iduservcrm);
            var_dump($iduservcrm1);
            if (in_array($auru->lotId, $idLotvcrm, true)) {
                $idLotvcrm1 = array_search($auru->lotId, $idLotvcrm);
                var_dump("lotId уже есть");
                var_dump($idLotvcrm1);
                $parameters = [
                    'type' => 'lead',
                    'element_id' => $id[$idLotvcrm1]['id']
                ];
                $notes = $amo->note;
                $idnotes = $notes->apiList($parameters);
                print_r($idnotes);
                print_r("id v notes->apiList");
                print_r(count($idnotes));
                if (in_array($auru->id, $idvcrm, true)) {
                    var_dump("Notes уже есть");
                    for ($j = 0; $j < count($idnotes); ++$j) {
                        $data[] = (substr($idnotes[$j]['text'], -24));
                    }
                    if (in_array($auru->dateCreate, $data, true)){
                        var_dump("data == auru->dateCreate");
                        return $auru;
                    }
                    else {
                        $idvcrm1 = array_search($auru->id, $idvcrm);
                        var_dump($idvcrm1);
                        $lead = $amo->lead;
                        $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
                        $lead['pipeline_id'] = 4143913; // ID воронки
                        $uplaeds = $lead->apiUpdate($id[$idvcrm1]['id']);
                        print_r($uplaeds);
                        $note = $amo->note;
                        $note['element_id'] = $id[$idvcrm1]['id'];
                        $note['element_type'] = 2; // 1 - contact, 2 - lead
                        $note['note_type'] = \AmoCRM\Models\Note::COMMON; // @see https://developers.amocrm.ru/rest_api/notes_type.php
                        $note['text'] = "Товар с AU.RU: " . $auru->itemName .
                            " \n Вопрос клиента: " . $auru->quest .
                            " \n Логин в AU.RU: " . $auru->login .
                            " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
                            " \n Дата вопроса: " . $auru->dateCreate;
                        $id = $note->apiAdd();
                        print_r($id);
                        return $id;
                    }
                } else {
                    var_dump("Notes-_Notes NULL");
                    $note = $amo->note;
                    $note['element_id'] = $id[$idLotvcrm1]['id'];
                    $note['element_type'] = 2; // 1 - contact, 2 - lead
                    $note['note_type'] = \AmoCRM\Models\Note::COMMON; // @see https://developers.amocrm.ru/rest_api/notes_type.php
                    $note['text'] = "Товар с AU.RU: " . $auru->itemName .
                        " \n Вопрос клиента: " . $auru->quest .
                        " \n Логин в AU.RU: " . $auru->login .
                        " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
                        " \n Дата вопроса: " . $auru->dateCreate;
                    $id = $note->apiAdd();
                    print_r($id);
                    return $id;
                }
            } else {
                var_dump("userId уже есть но Leads NULL");
                $lead = $amo->lead;
                $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
                $lead['pipeline_id'] = 4143913; // ID воронки
                $idlead = $lead->apiAdd();
                var_dump($idlead);
                return addNotes((int)$idlead, $auru, $amo);
            }
        } else {
            var_dump("Leads NULL");
            $lead = $amo->lead;
            $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
            $lead['pipeline_id'] = 4143913; // ID воронки
            $idlead = $lead->apiAdd();
            var_dump($idlead);
            return addNotes((int)$idlead, $auru, $amo);
        }
//        for($i = 0; $i < count($id); ++$i) {
//            var_dump("это фор");
//            var_dump($id[$i]['name']);
//            $iduservcrm = (int)(substr($id[$i]['name'], 5, -16));
//            $idvcrm = (int)(substr($id[$i]['name'], 13, -9));
//            $idLotvcrm = (int)(substr($id[$i]['name'], -8));
//            var_dump($iduservcrm);
//            var_dump($idvcrm);
//            var_dump($idLotvcrm);
//            if ($iduservcrm == $auru->lotId) {
//                if ($idvcrm == $auru->lotId) {
//                    var_dump("Leads уже есть");
//                    $parameters = [
//                        'type' => 'lead',
//                        'element_id' => $id[$i]['id']
//                    ];
//                    $notes = $amo->note;
//                    $idnotes = $notes->apiList($parameters);
//                    print_r($idnotes);
//                    print_r("id v notes->apiList");
//                    print_r(count($idnotes));
//                    if ($idLotvcrm == $auru->id) {
//                        var_dump("Notes уже есть");
//                        for ($j = 0; $j < count($idnotes); ++$j) {
//                            $data = (substr($idnotes[$j]['text'], -24));
//                            if ($data == $auru->dateCreate) {
//                                var_dump("data == auru->dateCreate");
//                                return true;
//                            } else {
//                                $note = $amo->note;
//                                $note['element_id'] = $id[$i]['id'];
//                                $note['element_type'] = 2; // 1 - contact, 2 - lead
//                                $note['note_type'] = \AmoCRM\Models\Note::COMMON; // @see https://developers.amocrm.ru/rest_api/notes_type.php
//                                $note['text'] = "Товар с AU.RU: " . $auru->itemName .
//                                    "\n Вопрос клиента: " . $auru->quest .
//                                    " \n Логин в AU.RU: " . $auru->login .
//                                    " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
//                                    " \n Дата вопроса: " . $auru->dateCreate;
//                                $id = $note->apiAdd();
//                                print_r($id);
//                                return $id;
//                            }
//                            var_dump($idnotes[$j]['text']);
//                        }
//                        return $idLotvcrm;
//                    } else {
//                        var_dump("Notes NULL");
//                        $note = $amo->note;
//                        $note['element_id'] = $id[$i]['id'];
//                        $note['element_type'] = 2; // 1 - contact, 2 - lead
//                        $note['note_type'] = \AmoCRM\Models\Note::COMMON; // @see https://developers.amocrm.ru/rest_api/notes_type.php
//                        $note['text'] = "Товар с AU.RU: " . $auru->itemName .
//                            "\n Вопрос клиента: " . $auru->quest .
//                            " \n Логин в AU.RU: " . $auru->login .
//                            " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
//                            " \n Дата вопроса: " . $auru->dateCreate;
//                        $id = $note->apiAdd();
//                        print_r($id);
//                        return $idLotvcrm;
//                    }
//                    return $idvcrm;
//                } else {
//                    var_dump("Leads NULL");
////                for($j = $i; $j < count($id); ++$j) {
////                    var_dump($id[$j]);
////                    if ($idvcrm = (int)(substr($id[$j]['name'], 5, -8)) == $auru->lotId){
////                        return true;
////                    }else{
////                        $lead = $amo->lead;
////                        $lead['name'] = 'AU.RU '. $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
////                        $lead['pipeline_id'] = 4143913; // ID воронки
////                        $idlead = $lead->apiAdd();
////                        return addNotes((int)$idlead,$auru,$amo);
////                    }
////                }
//                    $lead = $amo->lead;
//                    $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
//                    $lead['pipeline_id'] = 4143913; // ID воронки
//                    $idlead = $lead->apiAdd();
//                    return addNotes((int)$idlead, $auru, $amo);
//                }
//            }
//        }
//        $lead = $amo->lead;
//        $lead['name'] = 'AU.RU ' . $auru->lotId . ',' . $auru->id;
//        $lead['pipeline_id'] = 4143913; // ID воронки
////        $lead['status_id'] = 39069235; // ID статуса
////        // $lead->addCustomField(305117, [ // ID  поля в которое будт приходить заявки
////        //     [$_POST['city']], // сюда вписать значение из атрибута "name" пример: <input name="phone">
////        // ]);
////
//        $id = $lead->apiAdd();

//        // Получение экземпляра модели для работы с контактами
//        $contact = $amo->contact;
//
//        // Заполнение полей модели
//        $contact['name'] = isset($_POST['name']) ? $_POST['name'] : 'Не указано';
//        $contact['linked_leads_id'] = [(int)$id];
//
//        $contact->addCustomField(305117, [
//            [$_POST['city']],
//        ]);
//
//        $contact->addCustomField(304033, [
//            [$_POST['email'], 'PRIV'],
//        ]);
//
//
//
//        // Добавление нового контакта и получение его ID
//        $id = $contact->apiAdd();


    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }
    return $id;
}
