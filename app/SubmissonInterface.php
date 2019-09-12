<?php

namespace App;

use App\User;

interface SubmissonInterface
{

    const STATUS_Bound = 1;
    const STATUS_RequestToBind = 2;
    const STATUS_Quoted = 3;
    const STATUS_RequestToQuote = 4;

    function getDisplayId(): string;
    function getUser(): User;
    function getSubmissionType(): string;
    function getRouteKeyName(): string;
    function getFilesDirName(): string;
    public function bind(): void;
    public function bindRequest(): void;
    public function quote(): void;
    public function quoteRequest(): void;
}
