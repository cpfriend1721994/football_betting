@extends('layouts.app')

@section('content')

@foreach ($table as $row)
@if($row->permision == 'public')

<?php
    $count1 = DB::table('bets')->where('choose','home')->where('match_id',$row->id);
    $count2 = DB::table('bets')->where('choose','guest')->where('match_id',$row->id);
    $count3 = DB::table('bets')->where('choose','tie')->where('match_id',$row->id);
    $time=date("H:i A",strtotime($row->bet_time));
    $time1=date("H:i A",strtotime($row->start_time));
    $time2=date("H:i A",strtotime($row->end_time));
    $time3=date("D, M j",strtotime($row->start_time));
?>
<div class="Container">
        <div class="inner-page">
            <div class="contmid">
                {{-- <div class="headtext"></div> --}}
                <div class="bxbit" >
                <div class="rowbit">
                    <h2 class="date"> {{$time3}} <font color="red">{{$time1}} - {{$time2}}</font></h2>
                    <div class="linebox clearfix">
                        <div class="bxtime top bxtime-user">
                        @if(strtotime($row->start_time) > time())
                            <span class="txt"><button type="button" class="btn btn-success"><a href="{{url('bet')}}/{{$row->id}}"><font color="white"><b>Let's Bet !!!</b></a></font></button></span>
                            <span class="time"></span>
                        @else
                            <span class="txt"><button type="button" class="btn"><b>Bet Not Available</b></button></span>
                            <span class="time"></span>
                        @endif
                        </div>
                        <div class="bxteamleft">
                            <span id="home_team" class="nameteam">{{$row->home_team}}</span>
                        </div>
                        <div class="bxflags">
                            <span class="flags">
                                <img src="images/home.png" alt="home">
                            </span>
                            <span class="point">{{$row->home_score}} : {{$row->guest_score}}</span>
                            <span class="flags">
                                <img src="images/guest.png" alt="guest">
                            </span> 
                        </div>
                        <div class="bxteamright">
                            <span id="visitor_team" class="nameteam">{{$row->guest_team}}</span>
                            {{-- <span class="bitted"> donedone</span> --}}
                        </div>
                    </div>
                    <div class="bxseclbit">

                        <form action="#" method="post" accept-charset="utf-8" id="formbet">
                            <input type="hidden" name="choose_team_win" value="">
                            <input type="hidden" name="match_id" value="">

                            <div class="col" id="home_win">
                                <input type="button" id="home_win" class="btbit" value="Home : 1/{{$row->home_ratio}}">
                                <input type="button" id="home_win" class="btbit" value="{{$count1->count()}} bets">
                            </div>

                             <div class="col" id="home_win">
                                <input type="button" id="home_win" class="btbit" value="Tie : 1/{{$row->tie_ratio}}">
                                <input type="button" id="home_win" class="btbit" value="{{$count3->count()}} bets">
                            </div>
                             <div class="col" id="home_win">
                                <input type="button" id="home_win" class="btbit" value="Guest : 1/{{$row->guest_ratio}}">
                                <input type="button" id="home_win" class="btbit" value="{{$count2->count()}} bets">
                            </div>
                        </form>
                    </div>
                    @if(strtotime($row->start_time) > time())
                    <div class="rowbit">
                        <h2 class="date"><font color="orange"> * Bet will end at {{$time}}</font></h2>
                        <li>{{\Carbon\Carbon::createFromTimeStamp(strtotime($row->start_time))->diffForHumans()}}<li>
                    </div>
                    @else
                    <div class="rowbit">
                        <h2 class="date"><font color="gray"> * Bet ended at {{$time}}</font></h2>
                        <li>{{\Carbon\Carbon::createFromTimeStamp(strtotime($row->start_time))->diffForHumans()}}</li>
                    </div>
                    @endif
                </div>
                </div>
            </div>    
        </div>
</div>
@endif
@endforeach


@endsection