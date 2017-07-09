<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.05.17
 * Time: 19:40
 */
require_once('lib/CallbackForm.php');
require_once('lib/FeedbackForm.php');

//var_dump($_POST);

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$formType = trim($_POST['formType']);

//var_dump($formType);

if ($formType === 'callback') {
    $form = new CallbackForm($formType, $name, $phone);

} elseif ($formType === 'feedback') {
    $form = new FeedbackForm($formType, $name, $phone, $email);
} else {
    echo "Error";
    die();
}
//Полиморфизм
if ($form->validate()) {
    $form->send();
} else {
    echo 'Введите корректные данные';
}