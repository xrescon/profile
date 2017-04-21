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
                        <span class="caption-helper">Author: {{ $channel->user_name }}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="context" data-toggle="context" data-target="#context-menu">
                        <p> {{ $channel->description }} </p>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        @endforeach
    </div>
@endsection