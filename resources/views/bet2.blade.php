@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-13 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Admin's Page</div>

                <div class="panel-body">
                    <div class="Container">
    
        <div class="navtab-users">
                <ul class="menutab">
                    <li><a>All Bets Information</a></li>

                </ul>
            </div>
            <div class="contmid">
                <div class="bxcont">
                    <div class="croll_tb">
                        <table class="table table-hover" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">Match</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Money</th>
                                    <th class="text-center">Choose</th>
                                    <th class="text-center">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $table = DB::table('bets')
                                            ->join('matches', 'bets.match_id', '=', 'matches.id')
                                            ->join('users', 'bets.user_id', '=', 'users.id')
                                            ->select('bets.money','bets.choose','bets.created_at','matches.home_team','matches.guest_team','users.name')
                                            ->get();
                                        
                                ?>
                                @foreach ($table as $row)
                                    
                                <tr>
                                    <td class="text-center">{{$row->home_team}} - {{$row->guest_team}}</td>
                                    <td class="text-center">{{$row->name}}</td>
                                    <td class="text-center">{{$row->money}}</td>
                                    <td class="text-center">{{$row->choose}}</td>
                                    <td class="text-center">{{$row->created_at}}</td>
                                </tr>   

                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
    </div><!--end container-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection