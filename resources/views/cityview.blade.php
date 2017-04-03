@extends("layouts.game")
@section('site_head')
    {{$city->name}}
    <br/>
    <small>Owned by {{$owner->name}}</small>
@endsection
@section('mainarea')
    <a style="width: 140px !important;
     height: 30px !important;" href="{{route('/map')}}">
        <button class="btn-primary" style="width: 140px !important; height: 30px !important;" >Move to map
        </button></a>
    <br/>
    <br/>
    <br/>
    <div style="width: 100%;">
    <div style="margin-left: auto; margin-right: auto;">
    <form method="post" action="/city/{{$city->id}}/attack">
        <input type="submit" class="btn btn-danger" value="Attack this city">
    {{csrf_field()}}</form>
    <br/>
    </div>
    </div>
@endsection