<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request)
    {
        Mail::raw('A user clicked START YOUR TRANSFORMATION!', function ($message) {
            $message->to('brutecharge@gmail.com')
                    ->subject('New Transformation Request');
        });

        return back()->with('success', 'Your request has been sent!');
    }
}
