@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($subscribers as $item)
        <div class="col-md-3 ">
                <div class="portlet light text-center">
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <b>{{ $item->name }}</b>
                        </div>
                        <a href="{{ config('app.url') }}/user_channels/{{ $item->id }}">
                            <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection