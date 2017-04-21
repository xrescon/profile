<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscribe extends Model
{
    public function subscribeToChannel($userId, $channelId)
    {
        return DB::table('subscribe_channels')->insert(
            [
                'user_id' => $userId,
                'channel_id' => $channelId
            ]
        );
    }

    public function unsubscribeToChannel($userId, $channelId)
    {
        return DB::table('subscribe_channels')
            ->where('user_id', '=', $userId)
            ->where('channel_id', '=', $channelId)
            ->delete();
    }
    
//    public function getMySubscriptions($userId)
//    {
//        return DB::table('subscribe_channels')
//            ->select('users.id', 'users.name')
//            ->join('channels', 'subscribe_channels.channel_id' , '=', 'channels.id')
//            ->join('users', 'channels.user_id', '=', 'users.id')
//            ->where('subscribe_channels.user_id', '=', $userId)
//            ->get();
//    }

    public function getMySubscribers($userId)
    {
        $channels = new Channel();

        $userChannels = $channels->getAllChannelsByUserId($userId)->toArray();

        if (!empty($userChannels)) {
            $channelsIds = array_map(function ($e) {
                return is_object($e) ? $e->id : $e['id'];
            }, $userChannels);
    
            return DB::table('subscribe_channels')
                ->select('users.id', 'users.name')
                ->join('users', 'subscribe_channels.user_id', '=', 'users.id')
                ->whereIn('subscribe_channels.channel_id', $channelsIds)
                ->get();
        }
        
        return false;
    }
}
