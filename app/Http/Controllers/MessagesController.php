<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    // Submit Form Data

    public function submit(Request $request){
      // return $request->input('name');

      // Using validation method
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required'
        ]);

        //return 'SUCCESS';

        // Create New Message
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');

        // Save Message
        $message->save();

        // Redirect
        return redirect('/')->with('success', 'Message Sent');

    }

    // Output All Messages
    public function getMessages(){
      $messages = Message::all();

      return view('messages')->with('messages', $messages);
    }
}
