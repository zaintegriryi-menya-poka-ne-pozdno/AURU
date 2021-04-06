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
        $id  = $lead->apiList($parameters);
        print_r($id);
        print_r("id v addLeads");
//        print_r($id[0]['name']);
        print_r(count($id));
        for($i = 0; $i < count($id); ++$i) {
//            $iduservcrm[$i] = (int)(substr($id[$i]['name'], 5, -16));
//            $idLotvcrm[$i] = (int)(substr($id[$i]['name'], 13, -9));
//            $idvcrm[$i] = (int)(substr($id[$i]['name'], -8));
            $kolzap = true;
            $userid = 0;
            $lotid = 0;
            $idid = 0;
            for($j = 0; $j < strlen($id[$i]['name']); ++$j){
                if ($id[$i]['name'][$j] == " "){
                    $posprobel = $j;
                }
                if ($id[$i]['name'][$j] == ","){
                    if ($kolzap == true){
                        $poszap1 = $j+1;
                        for ($g = $posprobel+1; $g<$j;++$g){
                            $userid .= $id[$i]['name'][$g];
                        }
                        $kolzap = false;
                        var_dump($kolzap);
                    }
                    elseif ($kolzap == false){
                        $poszap2 = $j+1;
                        if ($poszap2 != 0) {
                            for ($y = $poszap1; $y<$j;++$y){
                                $lotid .= $id[$i]['name'][$y];
                            }
                            for ($p = $poszap2; $p < strlen($id[$i]['name']); ++$p) {
                                $idid .= $id[$i]['name'][$p];
                            }
                            $kolzap = null;
                        }
                    }
                }
            }
            $iduservcrm[$i] = (int)($userid);
            $idLotvcrm[$i] = (int)($lotid);
            $idvcrm[$i] = (int)($idid);
        }
        var_dump($iduservcrm);
        var_dump($idvcrm);
        var_dump($idLotvcrm);
        print_r($auru);
        if (in_array($auru->userId, $iduservcrm, true)) {
            $idLotvcrm1 = 0;
            $iduservcrm1 = 0;
            var_dump("userId уже есть");
            for ($i = 0; $i < count($id); ++$i) {
                if ($auru->userId == $iduservcrm[$i]) {
                    for ($j = 0; $j < count($id); ++$j) {
                        if ($auru->lotId == $idLotvcrm[$j]) {
                            if ($i == $j) {
                                $iduservcrm1 = $i;
                                $idLotvcrm1 = $j;
                                var_dump($iduservcrm[$i]);
                                var_dump($idLotvcrm[$j]);
                                break;
                            }
                        }else {
                            $idLotvcrm1 = $auru->lotId;
                        }
                    }
                }
            }
            if (in_array($auru->lotId, $idLotvcrm, true)) {
//                $idLotvcrm1 = array_search($auru->lotId, $idLotvcrm);
                var_dump("lotId уже есть");

                var_dump($idLotvcrm1);
                $parameters = [
                    'type' => 'lead',
                    'element_id' => $id[$iduservcrm1]['id']
                ];
                $notes = $amo->note;
                $idnotes = $notes->apiList($parameters);
                print_r($idnotes);
                print_r("id v notes->apiList");
                print_r(count($idnotes));
                $text = false;
                for ($l = 0; $l < count($idnotes); ++$l) {
                    if ((strlen($idnotes[$l]['text'])) == ((strlen("Товар с AU.RU: " . $auru->itemName .
                            " \n Вопрос клиента: " . $auru->quest .
                            " \n Логин в AU.RU: " . $auru->login .
                            " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
                            " \n Дата вопроса: " . $auru->dateCreate))-1)) {
                        $text = true;
                        var_dump((strlen($idnotes[$l]['text']))-1);
                        var_dump(strlen("Товар с AU.RU: " . $auru->itemName .
                            " \n Вопрос клиента: " . $auru->quest .
                            " \n Логин в AU.RU: " . $auru->login .
                            " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
                            " \n Дата вопроса: " . $auru->dateCreate));
                        var_dump($text);
                    }
                    var_dump((strlen($idnotes[$l]['text']))-1);
                    var_dump(strlen("Товар с AU.RU: " . $auru->itemName .
                        " \n Вопрос клиента: " . $auru->quest .
                        " \n Логин в AU.RU: " . $auru->login .
                        " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
                        " \n Дата вопроса: " . $auru->dateCreate));
                    var_dump($text);

                }
                if (in_array($auru->id, $idvcrm, true)) {
                    var_dump("Notes уже есть");
                    for ($j = 0; $j < count($idnotes); ++$j) {
                        $data[] = (substr($idnotes[$j]['text'], -24));
                    }
                    var_dump($data);
                    var_dump($auru->dateCreate);
                    if (in_array($auru->dateCreate, $data, true)){
                        var_dump("data == auru->dateCreate");
                        return $auru;
                    }
                    elseif ($idLotvcrm1 != 0) {
                        $idvcrm1 = array_search($auru->id, $idvcrm);
                        var_dump($idvcrm1);
                        $lead = $amo->lead;
                        $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
                        $lead['pipeline_id'] = 4143913; // ID воронки
                        $uplaeds = $lead->apiUpdate($id[$iduservcrm1]['id']);
                        print_r($uplaeds);
                        return addNotes($id[$idvcrm1]['id'], $auru, $amo);
                    }
                } elseif ($idLotvcrm1 != 0) {
                    if ($text == false) {
                        var_dump("Notes-_Notes NULL");
                        $lead = $amo->lead;
                        $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
                        $lead['pipeline_id'] = 4143913; // ID воронки
                        $uplaeds = $lead->apiUpdate($id[$iduservcrm1]['id']);
                        return addNotes($id[$iduservcrm1]['id'], $auru, $amo);
                    }
                }
            } else {
                var_dump("userId уже есть но Leads NULL");
                $lead = $amo->lead;
                $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
                $lead['pipeline_id'] = 4143913; // ID воронки
//                $lead['status_id'] = 39069235; // ID статуса
//                $lead->addCustomField(670307, '100');
//                $lead->addCustomMultiField(670309,520025);
                $idlead = $lead->apiAdd();
                var_dump($idlead);
                return addNotes((int)$idlead, $auru, $amo);
            }
        } else {
            var_dump("Leads NULL");
            $lead = $amo->lead;
            $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
            $lead['pipeline_id'] = 4143913; // ID воронки
//            $lead['status_id'] = 39069235; // ID статуса
//            $lead->addCustomField(670307, '100');
//            $lead->addCustomMultiField(670309,520025);
            $idlead = $lead->apiAdd();
            var_dump($idlead);
            return addNotes((int)$idlead, $auru, $amo);
        }


//        if (in_array($auru->userId, $iduservcrm, true)) {
//            var_dump("userId уже есть");
//            $iduservcrm1 = array_search($auru->userId, $iduservcrm);
//            $idd = $iduservcrm1;
//            var_dump($iduservcrm1);
//            if (in_array($auru->lotId, $idLotvcrm, true)) {
//                for ($i = 0; $i < count($id); ++$i) {
//                    if ($auru->userId == $iduservcrm[$i]) {
//                        for ($j = 0; $j < count($id); ++$j) {
//                            if ($auru->lotId == $idLotvcrm[$j]) {
//                                if ($i == $j) {
//                                    $idd = $i;
//                                    break;
//                                }
//                            }
//                        }
//                    }
//                }
//
//                $idLotvcrm1 = array_search($auru->lotId, $idLotvcrm);
//                var_dump("lotId уже есть");
//                var_dump($idLotvcrm1);
//                $parameters = [
//                    'type' => 'lead',
//                    'element_id' => $id[$idd]['id']
//                ];
//                $notes = $amo->note;
//                $idnotes = $notes->apiList($parameters);
//                print_r($idnotes);
//                print_r("id v notes->apiList");
//                print_r(count($idnotes));
//                $text = false;
//                for ($l = 0; $l < count($idnotes); ++$l) {
//                    if ($idnotes[$l]['text'] == ("Товар с AU.RU: " . $auru->itemName .
//                            " \n Вопрос клиента: " . $auru->quest .
//                            " \n Логин в AU.RU: " . $auru->login .
//                            " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
//                            " \n Дата вопроса: " . $auru->dateCreate)) {
//                        $text = true;
//                    }
//                    var_dump($idnotes[$l]['text']);
//                    var_dump("Товар с AU.RU: " . $auru->itemName .
//                        " \n Вопрос клиента: " . $auru->quest .
//                        " \n Логин в AU.RU: " . $auru->login .
//                        " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
//                        " \n Дата вопроса: " . $auru->dateCreate);
//                    var_dump($text);
//                }
//                if (in_array($auru->id, $idvcrm, true)) {
//                    var_dump("Notes уже есть");
//                    for ($j = 0; $j < count($idnotes); ++$j) {
//                        $data[] = (substr($idnotes[$j]['text'], -24));
//                    }
//                    var_dump($data);
//                    var_dump($auru->dateCreate);
//                    if (in_array($auru->dateCreate, $data, true)) {
//                        var_dump("data == auru->dateCreate");
//                        return $auru;
//                    } else {
//                        for ($i = 0; $i < count($id); ++$i) {
//                            if ($auru->lotId == $idLotvcrm[$i]) {
//                                for ($j = 0; $j < count($id); ++$j) {
//                                    if ($auru->id == $idvcrm[$j]) {
//                                        if ($i == $j) {
//                                            $idvcrm1 = array_search($auru->id, $idvcrm);
//                                            var_dump($idvcrm1);
//                                            if ($text == false) {
//                                                $lead = $amo->lead;
//                                                $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
//                                                $lead['pipeline_id'] = 4143913; // ID воронки
//                                                $uplaeds = $lead->apiUpdate($id[$i]['id']);
//                                                print_r($uplaeds);
//                                                $note = $amo->note;
//                                                $note['element_id'] = $id[$i]['id'];
//                                                $note['element_type'] = 2; // 1 - contact, 2 - lead
//                                                $note['note_type'] = \AmoCRM\Models\Note::COMMON; // @see https://developers.amocrm.ru/rest_api/notes_type.php
//                                                $note['text'] = "Товар с AU.RU: " . $auru->itemName .
//                                                    " \n Вопрос клиента: " . $auru->quest .
//                                                    " \n Логин в AU.RU: " . $auru->login .
//                                                    " \n Cсылка на товар AU.RU: " . $auru->questionUrl .
//                                                    " \n Дата вопроса: " . $auru->dateCreate;
//                                                $id = $note->apiAdd();
//                                                print_r($id);
//                                                return $id;
//                                            }
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    }
//                } else {
//                    for ($i = 0; $i < count($id); ++$i) {
//                        if ($auru->userId == $iduservcrm[$i]) {
//                            for ($j = 0; $j < count($id); ++$j) {
//                                if ($auru->lotId == $idLotvcrm[$j]) {
//                                    if ($i == $j) {
//                                        if ($text == false) {
//                                            var_dump("Notes-_Notes NULL");
//                                            $lead = $amo->lead;
//                                            $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
//                                            $lead['pipeline_id'] = 4143913; // ID воронки
//                                            $uplaeds = $lead->apiUpdate($id[$i]['id']);
//                                            return addNotes((int)$id[$i]['id'], $auru, $amo);
//                                        }
//                                    }
//                                    var_dump("Leads NULL");
//                                    $lead = $amo->lead;
//                                    $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
//                                    $lead['pipeline_id'] = 4143913; // ID воронки
////            $lead['status_id'] = 39069235; // ID статуса
////            $lead->addCustomField(670307, '100');
////            $lead->addCustomMultiField(670309,520025);
//                                    $idlead = $lead->apiAdd();
//                                    var_dump($idlead);
//                                    return addNotes((int)$idlead, $auru, $amo);
//
//                                }
//                            }
//                        }
//                    }
//                }
//            } else {
//                var_dump("userId уже есть но Leads NULL");
//                $lead = $amo->lead;
//                $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
//                $lead['pipeline_id'] = 4143913; // ID воронки
////                $lead['status_id'] = 39069235; // ID статуса
////                $lead->addCustomField(670307, '100');
////                $lead->addCustomMultiField(670309,520025);
//                $idlead = $lead->apiAdd();
//                var_dump($idlead);
//                return addNotes((int)$idlead, $auru, $amo);
//
//            }
//        }else {
//            var_dump("Leads NULL");
//            $lead = $amo->lead;
//            $lead['name'] = 'AU.RU ' . $auru->userId . ',' . $auru->lotId . ',' . $auru->id;
//            $lead['pipeline_id'] = 4143913; // ID воронки
////            $lead['status_id'] = 39069235; // ID статуса
////            $lead->addCustomField(670307, '100');
////            $lead->addCustomMultiField(670309,520025);
//            $idlead = $lead->apiAdd();
//            var_dump($idlead);
//            return addNotes((int)$idlead, $auru, $amo);
//        }


    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }
    return $id;
}
