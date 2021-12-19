<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Mail\SendMail;
use Mail;

class SendEmailController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function sendmail(Request $request)
    {
        // dd($request->all());
        $name = $request->fname.' '.$request->lname;
        $subject = $request->subject;
        $email = $request->email;
        
        $data = array(
            'name' => $name, 
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->message,
            'date' => date('l jS \of F Y h:i A')
        );
        
        Mail::send('emailTemplate', $data, function ($message) use ($email,$name,$subject) {
            $message->to('nahidcse244@gmail.com', 'admin')
            ->subject($subject);
           
            $message->from($email, $name);
            
        });
        dd('okk');
        return back()->with('message', 'Thank for contuct With us');
    }
}
