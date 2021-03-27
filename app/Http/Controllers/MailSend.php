<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
class MailSend extends Controller
{
    public function mailsend()
    {
    	$details = [
    		'title' => 'Title: Mail From PATA',
    		'body' => 'Body: You are Welcomed',
    	];

    	\Mail::to('kimatizyler@gmail.com')->send(new SendMail($details));
    	return view('thanks');
    }
}
