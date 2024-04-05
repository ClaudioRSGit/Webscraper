<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;
use App\Mail\CodeEmail;

trait RegisterCode
{
    public function sendCodeEmail($user)
    {
        $code = $user->registerCode;
        $emailData = ['code' => $code];
        $email = new CodeEmail($emailData);
        Mail::to($user->email)->send($email);
    }
}
