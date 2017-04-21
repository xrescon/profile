<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Channel;

class ChannelController extends Controller
{
    private $data = array();
    private $_channel = null;

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] =  '::Channels';
        $this->_channel = new Channel();
    }
    
    public function subscribeToChannel($channelId)
    {
        if ($this->_channel->checkChannelIfExists($channelId)) {
            $subscribe = new Subscribe();
            $subscribe->subscribeToChannel(Auth::user()->id, $channelId);
        }

        return redirect('/');
    }    
    public function unsubscribeToChannel($channelId)
    {
        if ($this->_channel->checkChannelIfExists($channelId)) {
            $subscribe = new Subscribe();
            $subscribe->unsubscribeToChannel(Auth::user()->id, $channelId);
        }

        return redirect('/');
    }

    public function getUserChannels($id)
    {
        $this->data['title'] = '::User Channels';
        $this->data['channelsList'] = $this->_channel->getAllChannelsByUserId($id);

        return view('channel', $this->data);
    }
    
    public function getChannel(Request $request)
    {
        return view('channel', $this->data);
    }

    public function getChannels()
    {
        $this->data['channelsList'] = $this->_channel->getAllChannels();

        return view('channel', $this->data);
    }
}
