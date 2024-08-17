<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(): RedirectResponse
    {
        // dd($message);

        $message = Validator::make(request()->all(), [
            'content' => 'required',
            'room_id' => 'required'
        ]);

        $messages = $message->getData();



        $messages['user_id'] = Auth::user()->id;




        Message::create([
            'content' => $messages['message'],
            'room_id' => $messages['room_id'],
            'user_id' => $messages['user_id'],
        ]);


        return redirect('/room/'. $messages['room_id']);
        
        
        
    }
}
