@extends("layouts.game")
@section('site_head')
    {{$city->name}}
    <br/>
    <small>Owned by {{$owner->name}}</small>
@endsection
@section('mainarea')
    <br/>
    <form method="post" action="/ht/public/city/3/attack">
        <input type="submit" class="btn btn-primary" value="Attack this city">
    {{csrf_field()}}</form>
    <br/>
    <a class="btn btn-primary" href="#EiToimi2">Send your troops to this city</a>
@endsection