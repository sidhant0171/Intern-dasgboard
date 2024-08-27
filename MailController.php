<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index($email, $name)
    {
        $mailData = [
            'title' => 'Welcome to Our Platform',
            'body' => "Hi $name, welcome to our platform. We are glad to have you!"
        ];

        Mail::to($email)->send(new DemoMail($mailData));
    }
}
