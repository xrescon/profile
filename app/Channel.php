<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Channel extends Model
{
    public function getChannel($id)
    {
        return DB::table('channels')->where('id', $id)->get();
    }

    public function checkChannelIfExists($channelId)
    {
        return Channel::where('id', '=', $channelId);
    }

    public function getAllChannelsByUserId($userId)
    {
        if ($userId) {
            return DB::table('channels')
                ->select('channels.*', 'users.name as user_name')
                ->join('users', 'users.id', '=', 'channels.user_id')
                ->where('users.id', $userId)
                ->latest('created_at')
                ->get();
        }
        
        return array();
    }
    
    public function getAllChannels()
    {
        $result = DB::table('channels')
            ->select('channels.*', 'users.name as user_name', 'subscribe_channels.id as is_subscribe')
            ->join('users', 'users.id', '=', 'channels.user_id')
            ->leftJoin('subscribe_channels', function ($join) {
                $join->on('subscribe_channels.channel_id', '=', 'channels.id')
                    ->where('subscribe_channels.user_id', '=', Auth::user()->id);
            })
            ->latest('created_at')
            ->get();
        
        return $result;
    }
}
