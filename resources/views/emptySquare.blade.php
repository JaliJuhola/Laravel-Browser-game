@extends("layouts.game")
@section('site_head')
    <p>Wilderness</p>
    <small>({{$square->xCord}}, {{$square->yCord}}</small>
@endsection
@section('mainarea')

    <br/>
    <form method="post" action="/addCity/{{$square->xCord}}/{{$square->yCord}}">
        <input type="submit" class="btn btn-primary" value="Settle here">
        {{csrf_field()}}</form>
    <br/>
@endsection