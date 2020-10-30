<?php

namespace App\Http\Controllers;

use App\Mail\SendMail; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request) { 
        $title = 'Thank you for your order'; 
        $customer_details = [ 
        'name' => $request->get('name'), 
        
        'email' => $request->get('email') 
        ]; 
        
           $sendmail = Mail::to($customer_details['email'])
           ->send(new SendMail($title, $customer_details));
           if (empty($sendmail)) { 
             return response()->json(['message'
             => 'Mail Sent Sucssfully'], 200); 
             }else{ 
                 return response()->json(['message' => 'Mail Sent fail'], 400); } } 
                 
}
