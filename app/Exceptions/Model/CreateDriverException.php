<?php
namespace App\Exceptions\Model;

class CreateDriverException extends \Exception
{
    public function __construct($message)
    {
        $error = json_decode(str_replace(preg_replace('~\{(?:[^{}]|(?R))*\}~', '',  $message), '', $message), true);

        parent::__construct(json_encode($error['error']));
    }
}
