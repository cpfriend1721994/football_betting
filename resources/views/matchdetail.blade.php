
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-13 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Match Detail</div>

                <div class="panel-body">
                    <div class="banner-bread">
        <div class="inner-page clearfix">
            
                {{-- <div class="avatar">
                    <img src="images/avatar.png" alt="Avatar">
                </div> --}}
                
                    {{-- <p>Welcome</p> --}}
                    <p><strong>{{$id->home_team}} - {{$id->guest_team}}</strong></p>
                    <p>Result: <strong id="point-store" style="color: red">{{$id->home_score}} - {{$id->guest_score}}</strong></p>
                    <p>Home Ratio: <strong id="point-store" style="color: #0089dd"> 1/{{$id->home_ratio}}</strong></p>
                    <p>Guest Ratio: <strong id="point-store" style="color: #0089dd"> 1/{{$id->guest_ratio}}</strong></p>
                    <p>Tie Ratio: <strong id="point-store" style="color: #0089dd"> 1/{{$id->tie_ratio}}</strong></p>
                    <p>Permision: <strong id="point-store" style="color: green"> {{$id->permision}}</strong></p>
                    {{-- <p>Information</p> --}}
        
    </div><!--end banner-bread-->
    <div class="Container">
            <div class="navtab-users">
                <h2 class="subtitle">
                    <span>Match History</span>
                </h2>
            </div>
            <div class="contmid">
                <div class="bxcont">
                    <div class="croll_tb">
                        <table class="table table-hover" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Choose</th>
                                    <th class="text-center">Money Bet</th>
                                    <th class="text-center">Money Earn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $table = DB::table('bets')
                                            ->join('users', 'bets.user_id', '=', 'users.id')
                                            ->where('match_id',$id->id)
                                            ->select('users.name','users.email','bets.choose','bets.money')
                                            ->get();
                                        
                                ?>
                                    @foreach ($table as $row)
<?php 
    $money_get=0;
    if(($id->home_score > $id->guest_score) && ($id->choose =='home'))
        $money_get=$row->money*$id->home_ratio;
    if(($id->home_score < $id->guest_score) && ($id->choose =='guest'))
        $money_get=$row->money*$id->guest_ratio;
    if(($id->home_score == $id->guest_score) && ($id->choose =='tie'))
        $money_get=$row->money*$id->tie_ratio;
    if($id->status==0) $money_get="updating";
?>
                                <tr>
                                    <td class="text-center">{{$row->name}}</td>
                                    <td class="text-center">{{$row->email}}</td>
                                    <td class="text-center">{{$row->choose}}</td>
                                    <td class="text-center">{{$row->money}}</td>
                                    <td class="text-center">{{$money_get}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection