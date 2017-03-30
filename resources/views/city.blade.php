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
    <div style="height: 400px;">
    <div style="margin-top: 23px;">
    <trooplist></trooplist>
        <div class="panel panel-default" style="width: 200px; display: inline-block;
    border: 1.2px solid; border-color: #2a88bd; position: absolute; top: 312px; left: 530px;">
            <div class="panel-item">
                <div class="panel-heading" style="text-align: center">
                    <h4>Train troops</h4>
                </div>
                <div class="panel-body">
    <form action="/ht/public/army/train/{{$army->id}}" method="post">
        {{csrf_field()}}
        @foreach($troopUnits as $unit)
                <div class="form-group form-group-sm">
                    <span style="text-align: center;">{{$unit->troopname}}</span>
                    <br/> <div style="margin-left: auto;
                     margin-right: auto"><input style="width: 100px;"
                                                class="form-control" type="number" name="{{$unit->troopname}}Amount"></div>
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