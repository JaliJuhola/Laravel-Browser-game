@extends('layouts.game')
@section('site_head')
    <h1 style="text-align: center">Map</h1>
@endsection
@section('mainarea')
    <div class="panel panel-info" style="width: 80%">
        <div style="margin-left: auto; margin-right: auto;">
            <br/>
            @foreach($gameworld as $item)
                <button>
                    <?php $namePrinted = false;?>
                    @foreach($cities as $city)
                        @if($city->id === $item->city_id)
                            <a href="/ht/public/city/{{$item->city_id}}">
                                {{$city->name}}
                            </a>
                            <?php $namePrinted = true; ?>
                        @endif
                    @endforeach
                    @if (!$namePrinted)
                        <a href="/ht/public/square/{{$item->xCord}}/{{$item->yCord}}">
                            X: {{$item->xCord}} Y: {{$item->yCord}}
                        </a>
                    @endif
                </button>
                @if($item->xCord === 3)
                    <br/>
                @endif
            @endforeach
        </div>
    </div>
@endsection
