<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.07.2017
 * Time: 20:19
 */
require_once('CallbackForm.php');

class RequestForm extends CallbackForm
{

    public $email;

    public function __construct(string $formType, string $name, int $phone, string $email)
    {
        parent::__construct($formType, $name, $phone);

        $this->email = $email;
    }

    public function validate(): bool
    {
        if (!parent:: validate()) {
            return false;
        }
        if (!preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/",
            $this->email)
        ) {
            return false;
        }
        return true;
    }

    public function send()
    {
        parent::send();
        echo '<br>';
        echo 'Email: ' . $this->email;
    }
}