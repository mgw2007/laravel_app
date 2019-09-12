<?php

namespace App;

trait SubmissionTriat
{


    public function bind(): void
    {
        $this->status = self::STATUS_Bound;
    }

    public function bindRequest(): void
    {
        $this->status = self::STATUS_RequestToBind;
    }

    public function quote(): void
    {
        $this->status = self::STATUS_Quoted;
    }

    public function quoteRequest(): void
    {
        $this->status = self::STATUS_RequestToQuote;
    }


    function getDisplayId(): string
    {
        return $this->display_id;
    }
    function getUser(): User
    {
        return $this->user;
    }
}
