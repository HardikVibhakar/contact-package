<?php

namespace Devdojo\Calculator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Devedojo\Calculator\Models\Contact;
use Mail;

class EmailController extends Controller
{
	public function index(){
		return view('calculator::email');
	}

	public function send(Request $request){

		$maildata[] = '';
        $signature_msg = '';
        $mail_msg = '';
        $mail_msg .= "<b>Hello,</b><br><br>";
        $mail_msg .= "There was an inquiry from ".$request->name."</b><br><br><br>";
        $mail_msg .= "Email-ID : ".$request->email;
        $mail_msg .= "<br><br>";
        $mail_msg .= "Message : ".$request->message;
        $mail_msg .= "<br><br>";
        $signature_msg .= "<br>Regards,</b>";
        $signature_msg .= "<br>Finlark</b><br>";
        $title = "Contact Us Inquiry";

        $maildata['body'] = $mail_msg;
        $maildata['signature_msg'] = $signature_msg;

        Mail::send('calculator::mail', $maildata, function ($message) use ($title)
        {
            $message->from('hardik.finlark@gmail.com', 'Finlark');
            $message->to(config('calculator.send_email_to'));
            $message->subject($title);
        });
		Contact::create($request->all());
		return redirect(route('contact'));
	}
    //
    public function add($a, $b){
    	$result = $a + $b;
    	return view('calculator::email', compact('result'));
    }

    public function subtract($a, $b){
    	echo $a - $b;
    }
}