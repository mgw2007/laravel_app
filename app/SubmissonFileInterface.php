<?php

namespace App;

use App\User;

interface SubmissonFileInterface
{

    public function getFilePath(): string;
    public function getFileName(): string;
    public function getSubmission(): SubmissonInterface;
}
