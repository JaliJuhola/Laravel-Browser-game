@extends("layouts.app")
@section("navigation")
    <style>
        .navbar-head {
            background: none repeat scroll 0 0 #2AA4CF !important;
            color: #333 !important;
        }
    </style>
    <div class="btn-group btn-group-justified navbar-head" role="group" aria-label="..." style="margin-top: -1.8%;">
        <div class="btn-group" role="group">
            <a style="decoration: none;" href={{route('home')}}>
                <button id="additionalView" type="button" class="btn btn-default">Home</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a style="decoration: none;" href="{{route('city')}}">
                <button id="cityView" type="button" class="btn btn-default">City view</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a style="decoration: none;" href="{{route('/map')}}">
                <button id="mapView" type="button" class="btn btn-default">Map</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a style="decoration: none;" href="{{route('/players')}}">
                <button id="playersView" type="button" class="btn btn-default">Players</button>
            </a>
        </div>
    </div>
@endsection
@section ("content")
<div class="container" style="width: 96%; ">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align: center">
                        @yield('site_head')
                    </h1>
                </div>
                @yield('mainarea')
            </div>
    </div>
</div>
@endsection