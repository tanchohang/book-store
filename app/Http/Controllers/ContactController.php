<?php

namespace App\Http\Controllers;


use Anam\Captcha\Captcha;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Toastr;
use Mail;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    public function getContact(){
        return view('frontend.contact');
    }

    public function postToAdmin(Request $request,Captcha $captcha){
        $contact = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'subject'=>$request->input('subject'),
            'contactmessage'=>$request->input('message')

        ];

        $response = $captcha->check($request);

        if ($response->isVerified()) {
            Mail::send('emails.contact',$contact,function ($message){
//                $message->from('tanchohang@gmail.com');
//                $message->to('tanchohang@gmail.com');
//                $message->subject($contact['subject']);
            });
        }




        Toastr::success('Your message has been sent!');

        return redirect()->route('contact');
    }

}
