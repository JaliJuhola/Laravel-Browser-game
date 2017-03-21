@extends("layouts.game")
@section('site_head')
    {{$city->name}} @if($city->capital) <small>Capital</small>@endif
@endsection
@section('content')
Taalla jotain tietoa


@endsection