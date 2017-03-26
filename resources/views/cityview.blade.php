@extends("layouts.game")
@section('site_head')
    {{$city->name}}
@endsection
@section('mainarea')

    <br/>
    <form method="post" action="/ht/public/city/3/attack"><input type="submit" value="Attack this city">
    {{csrf_field()}}</form>
    <br/>
    <a href="#EiToimi2">Send your troops to this city</a>
@endsection