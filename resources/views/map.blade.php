@extends('layouts.game')
@section('site_head')
    <h1 style="text-align: center">Map</h1>
@endsection
@section('mainarea')
    <div class="panel panel-info" style="width: 80%">
        <div style="margin-left: auto; margin-right: auto;">
        @foreach($gameworld as $item)
            <a href="/ht/public/city/{{$item->city_id}}">
                <button>
                    <?php $namePrinted = false;?>
                    @foreach($cities as $city)
                        @if($city->id === $item->city_id)
                            {{$city->name}}
                            <?php $namePrinted = true; ?>
                        @endif

                    @endforeach
                    <?php
                    if (!$namePrinted) {
                        echo "X: $item->xCord Y: $item->yCord";
                    }
                    ?>
                </button>
            </a>
            @if($item->xCord === 3)
                <br/>
                @endif
                @endforeach
                </ul>
        </div>
    </div>
@endsection
