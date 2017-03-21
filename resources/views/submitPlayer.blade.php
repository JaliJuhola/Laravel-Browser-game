@extends('layouts.app')

@section('content')
    <style>
        .moveCenter
        {
            margin-left: 200px !important;
        }
    </style>
    <div class="moveCenter" style="margin-left: 200px!important;">
        <div class="">
            <h1>Choose your tribe:</h1>
            <p><small>
             Choose your tribe to upcoming battle. Currently there is only one tribe(BasicTribe)
                </small></p>
        </div>
        <div class="">
            <form class="btn" method="post" action="{{route("player/save")}}">
                <input type="submit" value="BasicTribe"><i></i><span></span>
                <input type="hidden" name="tribe" value="BasicTribe">
                {{csrf_field()}}
            </form>
            <small>Info about tribe is here. I have to just tell something about tribe.</small>

        </div>
        <div class="">
            <form class="btn" method="post" action="{{route("player/save")}}">
                <input type="submit" value="Nothing here"><i></i><span></span>
                <input type="hidden" name="tribe" value="error">
                {{csrf_field()}}
            </form>
            <small>Info about tribe is here. I have to just tell something about tribe.</small>

        </div>
    </div>

@endsection