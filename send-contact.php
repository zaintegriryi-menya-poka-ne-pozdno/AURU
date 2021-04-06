<?php
require __DIR__ . '/vendor/autoload.php';
// include_once __DIR__ . '/unsorted/accept.php';
try {
      // Создание клиента
      $subdomain = '';            // Поддомен в амо срм
      $login     = '';            // Логин в амо срм
      $apikey    = '';            // api ключ
      $amo = new \AmoCRM\Client($subdomain, $login, $apikey);

        // Вывести полученые из амо данные
        // echo '<pre>';
        // print_r($amo->account->apiCurrent());
        // echo '</pre>';

        // создаем лида
        $lead = $amo->lead;
        $lead['name'] = $_POST['product_name'];
        // $lead['responsible_user_id'] = 2462338; // ID ответсвенного 
        // $lead['pipeline_id'] = 1207249; // ID воронки

        // $lead->addCustomField(305117, [ // ID  поля в которое будт приходить заявки
        //     [$_POST['city']], // сюда вписать значение из атрибута "name" пример: <input name="phone">
        // ]);

        $id = $lead->apiAdd();

      // Получение экземпляра модели для работы с контактами
      $contact = $amo->contact;

      // Заполнение полей модели
      $contact['name'] = isset($_POST['name']) ? $_POST['name'] : 'Не указано';
      $contact['linked_leads_id'] = [(int)$id];

        $contact->addCustomField(305117, [
            [$_POST['city']],
        ]);

        $contact->addCustomField(304033, [
            [$_POST['email'], 'PRIV'],
        ]);



      // Добавление нового контакта и получение его ID
      $id = $contact->apiAdd();


  } catch (\AmoCRM\Exception $e) {
      printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
  }

?>