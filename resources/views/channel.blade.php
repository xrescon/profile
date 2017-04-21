@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($channelsList as $channel)
        <div class="col-md-6">
            <!-- BEGIN PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-purple-plum">
                        <i class="icon-speech font-purple-plum"></i>
                        <span class="caption-subject bold uppercase"> {{ $channel->title }}</span>
                    </div>
                    @if (Auth::user()->id != $channel->user_id && isset($channel->is_subscribe))
                    <div class="actions">
                        @if ($channel->is_subscribe == null)
                            <a href="{{ config('app.url') }}/subscribe/{{ $channel->id }}" class="btn btn-primary mt-ladda-btn ladda-button">subscribe</a>
                        @else
                            <a href="{{ config('app.url') }}/unsubscribe/{{ $channel->id }}" class="btn btn-primary mt-ladda-btn ladda-button">unsubscribe</a>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="portlet-body">
                    <div id="context" data-toggle="context" data-target="#context-menu">
                        <p> {{ $channel->description }} </p>
                    </div>
                    <hr>
                    <div class="mt-author">
                        Author: <a href="{{ config('app.url') }}/user_channels/{{ $channel->user_id }}" class="font-blue-madison">{{ $channel->user_name }}</a>
                        <div class="pull-right">
                            Date: {{ $channel->created_at }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        @endforeach
    </div>
@endsection