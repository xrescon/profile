<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{

    private $data = array();
    private $_subscribe = null;

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] =  '::Subscribers';
        $this->_subscribe = new Subscribe();
    }
    
//    public function subscriptions()
//    {
//        $this->data['subscriptions'] = $this->_subscribe->getMySubscriptions(Auth::user()->id);
//    
//        return view('channels', $this->data);
//    }    

    public function subscribers()
    {
        $this->data['subscribers'] = $this->_subscribe->getMySubscribers(Auth::user()->id);
    
        return view('subscribe', $this->data);
    }
}
