<?php

namespace App\Http\Controllers;

use App\Models\SecretMessage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\Message;

class SendMailController extends Controller
{

    public function index()
    {
        return view('form-message');
    }

    //Enregristrer le message dans la base de données
    public function createMessage(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'message' => 'required|min:15'
        ]);

        $token = Str::random(40);
        $data = [
            'link' => url('/message/' . $token)
        ];

        $secretMessage = new SecretMessage();
        $secretMessage->message = $request->message;
        $secretMessage->email = $request->email;
        $secretMessage->token = $token;
        $secretMessage->save();

        Mail::to($request->email)->send(new Message($data));

        return redirect('new-message')->with('status', 'Message envoyé !');
    }

    public function show($token)
    {
        try{
            $message =  SecretMessage::where('token', $token)->firstOrFail();
            $message->delete();
            return view('message')->with('message', $message->message);
        } catch (ModelNotFoundException $exception){
            return redirect('/too-late');

        }
    }
}
