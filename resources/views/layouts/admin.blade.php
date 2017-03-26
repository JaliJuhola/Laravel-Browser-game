@extends('layouts.app')
@section("navigation")
    <style>
        .navbar-head {
            background: none repeat scroll 0 0 #2AA4CF !important;
            color: #333 !important;
        }
    </style>
    <div class="btn-group btn-group-justified navbar-head" role="group" aria-label="..." style="margin-top: -1.8%;">
        <div class="btn-group" role="group">
            <a style="decoration: none;" href={{route('admin/players')}}><button id="additionalView" type="button" class="btn btn-default">Players</button></a>
        </div>
        <div class="btn-group" role="group">
            <a style="decoration: none;" href="{{route('adming/log')}}"><button id="cityView" type="button" class="btn btn-default">Log</button></a>
        </div>
        <div class="btn-group" role="group">
            <a style="decoration: none;" href="{{route("admin/map")}}"><button id="mapView" type="button" class="btn btn-default">Map</button></a>
        </div>
        <div class="btn-group" role="group">
            <a style="decoration: none;" href="{{route('/players')}}"><button id="playersView" type="button" class="btn btn-default">Empty currently</button></a>
        </div>
    </div>

@endsection
@yield('content')
