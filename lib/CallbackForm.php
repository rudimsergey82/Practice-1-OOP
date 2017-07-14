<?php

/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.05.17
 * Time: 19:30
 */
require_once('FormAbstract.php');

class CallbackForm extends FormAbstract
{
    public $name;
    public $phone;

    public function __construct(string $formType, string $name, $phone)
    {
        parent::__construct($formType);
        $this->name = $name;
        $this->phone = $phone;
    }

    public function validate(): bool
    {
        if (empty($this->name) || strlen($this->name) > 20 || strlen($this->name) < 3) {
            return false;
        }

        if (empty($this->phone) || strlen($this->phone) < 10 || strlen($this->phone) > 12 || !preg_match("/^[\+][0-9]{10,12}$/", $this->phone)) {
            return false;
        }
        return true;
    }

    public function send()
    {
        echo 'Name: ' . $this->name;
        echo '<br>';
        echo 'Phone: ' . $this->phone;
    }
}