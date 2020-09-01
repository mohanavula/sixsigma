<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactUsEmail;
use App\Mail\SendStandardEmail;

class EmailController extends Controller
{
    public function send_contact_us_email(Request $request) {
        $validated = $request->validate([
            'message_subject' => 'required',
            'to' => 'required|email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'reply_to' => 'required|email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        
        $email = [
            'message_subject' => $request->message_subject,
            'to' => $request->to,
            'reply_to' => $request->reply_to,
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description
        ];


        Mail::to($request->to)
            ->send(new SendContactUsEmail($email));
    }

    public function send_standard_email(Request $request) {
        $validated = $request->validate([
            'to' => 'required|email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'reply_to' => 'required|email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'subject' => 'required',
            'body' => 'required'
        ]);
        
        $email = [
            'to' => $request->to,
            'reply_to' => $request->reply_to,
            'subject' => $request->subject,
            'body' => $request->body
        ];


        Mail::to($request->to)
            ->send(new SendStandardEmail($email));

        return response("Sent email successfully", 200);
    }
}
