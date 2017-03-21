@extends('layouts.game')
@section("site_head")
    Overall view
@endsection
@section('content')
    <div class="label label-primary">
                 {{csrf_field()}}
                    Vue.component('example', require('./components/Example.vue'));!
    </div>
@endsection
