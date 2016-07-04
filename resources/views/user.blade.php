@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-13 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>

                <div class="panel-body">
                    <div class="banner-bread">
        <div class="inner-page clearfix">
            
                {{-- <div class="avatar">
                    <img src="images/avatar.png" alt="Avatar">
                </div> --}}
                
                    {{-- <p>Welcome</p> --}}
                    <p><strong>{{$id->name}}</strong></p>
                    <p>You have <strong id="point-store" style="color: #ffce01"> {{$id->money}}</strong> APV Coins</p>
                    {{-- <p>Information</p> --}}
        
    </div><!--end banner-bread-->
    <div class="Container">
        
            <div class="navtab-users">
                <h2 class="subtitle">
                    <span>Betting History</span>
                </h2>
            </div>
            <div class="contmid">
                <div class="bxcont">
                    <div class="croll_tb">
                        <table class="table table-hover" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">Match</th>
                                    <th class="text-center">Result</th>
                                    <th class="text-center" width="130">Home Win</th>
                                    <th class="text-center" width="130">Guest Win</th>
                                    <th class="text-center" width="130">Tie</th>
                                    <th class="text-center">Money Bet</th>
                                    <th class="text-center">Team Bet</th>
                                    <th class="text-center">Money Get</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $table = DB::table('bets')
                                            ->join('matches', 'bets.match_id', '=', 'matches.id')
                                            ->where('user_id',$id->id)
                                            ->select('bets.*','matches.*')
                                            ->get();
                                        
                                ?>
                                    @foreach ($table as $table)
                                <tr>
                                    <td class="text-center">{{$table->home_team}} - {{$table->guest_team}}</td>
                                    <td class="text-center">{{$table->home_score}} - {{$table->guest_score}}</td>
                                    <td class="text-center">1/{{$table->home_ratio}}</td>
                                    <td class="text-center">1/{{$table->guest_ratio}}</td>
                                    <td class="text-center">1/{{$table->tie_ratio}}</td>
                                    <td class="text-center">{{$table->money}}</td>
                                    <td class="text-center">{{$table->choose}}</td>
                                    <?php
                                        $money_get=0;
                                        if(($table->home_score > $table->guest_score) && ($table->choose =='home'))
                                            $money_get=$table->money*$table->home_ratio;
                                        if(($table->home_score < $table->guest_score) && ($table->choose =='guest'))
                                            $money_get=$table->money*$table->guest_ratio;
                                        if(($table->home_score == $table->guest_score) && ($table->choose =='tie'))
                                            $money_get=$table->money*$table->tie_ratio;
                                        if($table->status==0) $money_get="updating";
                                    ?>
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