@extends("layouts.game")
@section('site_head')
    <form action="{{route("city/update/name")}}" method="post">
        <input name="id" type="hidden" value="{{$city->id}}">
        <input type="text" name="cityname" placeholder="{{$city->name}}">
        <input type="submit" value="Update" class="btn btn-primary btn-xs"/>
        {{csrf_field()}}
    </form> @if($city->capital)
        <small>Capital</small>@endif
@endsection
@section('mainarea')
    <h4>Your troopqueue</h4>
    @forelse($troopqueue as $unit)
        <li class="list-group-item">{{$unit->troopname}}({{$unit->amount}}) Ready: {{gmdate("H:i:s", $unit->troopsready)}}</li>
    @empty
        <li></li>
    @endforelse
    <h4>Your troops</h4>
    <ul class="list-group" style="width: 200px;">
        @forelse($troopUnits as $unit)
            <li class="list-group-item">{{$unit->troopname}}s: {{$unit->amount}}</li>
        @empty
            <li>There is no troops currently in your army</li>
        @endforelse

    </ul>
    <div>
    <h4>Train troops</h4>
    <form action="/ht/public/army/train/{{$army->id}}" method="post">
        {{csrf_field()}}
        @foreach($troopUnits as $unit)
                <div class="form-group form-group-sm">
                {{$unit->troopname}} <input style="width: 100px;" class="form-control" type="number" name="{{$unit->troopname}}Amount">
                </div>
        @endforeach
        <div class="form-group form-group-sm">
        <input style="margin-left: 20px;" type="submit" value="Train" class="btn btn-default">
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection