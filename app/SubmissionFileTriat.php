<?php

namespace App;

trait SubmissionFileTriat
{

    public function getFilePath(): string
    {
        return  $this->token;
    }
    public function getFileName(): string
    {
        return  $this->name;
    }
}
