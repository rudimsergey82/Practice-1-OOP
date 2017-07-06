<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.05.17
 * Time: 19:40
 */
require_once('lib/CallbackForm.php');
require_once('lib/RequestForm.php');

//var_dump($_POST);

$name = trim($_POST['name']);
$phone = (int)trim($_POST['phone']);
$email = trim($_POST['email']);
$formType = trim($_POST['formType']);

//var_dump($formType);

if ($formType != 'callback') {
    $form = new RequestForm($formType, $name, $phone, $email);
} else {
    $form = new CallbackForm($formType, $name, $phone);
}

if ($form->validate()) {
    $form->send();
} else {
    echo 'Введите корректные данные';
}

