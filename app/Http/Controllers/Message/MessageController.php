<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __invoke(): View
    {

        $message = request()->validate( request()->all(),[
            'message' => 'require'
        ]);

        $message['user_id'] = Auth::user()->id;

        dd($message);
        
        
        
    }
}
