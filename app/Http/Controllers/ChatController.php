<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    var $pusher;
    var $user;
    var $chatChannel;

    const DEFAULT_CHAT_CHANNEL = 'chat';

    public function __construct()
    {
        $this->pusher = App::make('pusher');
        $this->user = Session::get('user');
        $this->chatChannel = self::DEFAULT_CHAT_CHANNEL;
    }

    public function index()
    {
        /*if(!$this->user)
        {
            return redirect('auth/github?redirect=/chat');
        }*/

        return view('chat', ['chatChannel' => $this->chatChannel, 'status' => substr( md5(rand()), 0, 7)]);
    }

     public function getAdmin()
    {
        /*if(!$this->user)
        {
            return redirect('auth/github?redirect=/chat');
        }*/

        return view('chat', ['chatChannel' => $this->chatChannel,'status' => 'Admin']);
    }

    public function getIndex()
    {
        /*if(!$this->user)
        {
            return redirect('auth/github?redirect=/chat');
        }*/

        return view('chat', ['chatChannel' => $this->chatChannel]);
    }

    public function postMessage(Request $request)
    {
        $message = [
            'text' => e($request->input('chat_text')),
            'username' => e($request->input('status')),
            'tujuan' => 
            'avatar' => "bababa",
            'timestamp' => (time()*1000)
        ];
        $this->pusher->trigger($this->chatChannel, 'new-message', $message);
    }
}
