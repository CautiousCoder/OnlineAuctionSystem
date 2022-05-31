<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\mailTemplate;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('zahidul.cse.brur@gmail.com')->send(new mailTemplate($mailData));
           
        dd("Email is sent successfully.");
    }
}
