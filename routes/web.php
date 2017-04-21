<?php

Route::get('/', 'ChannelController@getChannels');
Route::get('/user_channels/{id}', 'ChannelController@getUserChannels')->where('id', '[0-9]+');
Route::get('/subscribe/{channelId}', 'ChannelController@subscribeToChannel')->where('channelId', '[0-9]+');
Route::get('/unsubscribe/{channelId}', 'ChannelController@unsubscribeToChannel')->where('channelId', '[0-9]+');

Route::get('/subscribers', 'SubscribeController@subscribers');
//Route::get('/my_subscription', 'SubscribeController@subscribers');

// Authentication routes...
Auth::routes();

Route::get('/profile', 'ProfileController@index');
