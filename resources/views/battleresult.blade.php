@extends('layouts.game')
@section('site_head')
    Result of battle
@endsection
@section('mainarea')
    <h4>Attacker troops</h4>
    @foreach($attackerBefore as $attacker)
        {{$attacker->troopname}} : {{$attacker->amount}}
    @endforeach
    <h4>Attacker troops remaining</h4>
   @foreach($attackerAfter as $attacker)
       {{$attacker->troopname}} : {{$attacker->amount}}
    @endforeach
    <h4>Defender troops</h4>
    @foreach($defenderBefore as $defender)
        {{$defender->troopname}} : {{$defender->amount}}
    @endforeach
    <h4>Defender troops remaining</h4>
    @foreach($defenderAfter as $defender)
        {{$defender->troopname}} : {{$defender->amount}}
    @endforeach

@endsection