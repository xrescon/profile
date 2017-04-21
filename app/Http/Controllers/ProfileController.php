<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Channel;

class ProfileController extends Controller
{
    private $data = array();
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] =  '::Profile';
    }

    public function index()
    {
        $channels = new Channel();

        $this->data['channelsList'] = $channels->getAllChannelsByUserId(Auth::user()->id);

        return view('profile', $this->data);
    }
}
