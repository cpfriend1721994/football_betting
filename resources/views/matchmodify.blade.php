@extends('layouts.app')

@section('content')
<?php
  $countBet = DB::table('bets')->where('match_id',$table->id)->count();
?>
<div class="container">
    <div class="row">
        <div class="col-md-13 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Admin's Page</div>

                <div class="panel-body">
                    <div class="Container">
    
        <div class="navtab-users">
                {{-- <h2 class="subtitle">
                    <span>Admin Page</span>
                </h2> --}}
                <ul class="menutab">
                    <li><a href="../match2">Edit Match</a></li>
                    <li><a href="../matchcreate">Create Match</a></li>

                </ul>
            </div>
           <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Modify Match</strong></div>
                <div class="panel-body">
                   <form action="{{url("matchmodify")}}/{{$table->id}}" method="POST" role="form">
                   {{csrf_field()}}
                      @if(($table->permision == 'private')||($countBet==0))
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Team</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->home_team}}" name="home_team">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Team</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->guest_team}}" name="guest_team">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Start Time</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" value="{{$table->start_time}}" placeholder="" name="start_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">End Time</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" value="{{$table->end_time}}" placeholder="" name="end_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Bet Time</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" value="{{$table->bet_time}}" placeholder="" name="bet_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Win Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->home_ratio}}" name="home_ratio">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Win Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->guest_ratio}}" name="guest_ratio">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Tie Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->tie_ratio}}" name="tie_ratio">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Score</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->home_score}}" name="home_score">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Score</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="{{$table->guest_score}}" name="guest_score">
                           </div>
                       </div>
                       @else
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Team</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->home_team}}" name="home_team">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Team</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->guest_team}}" name="guest_team">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Start Time</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" value="{{$table->start_time}}" placeholder="" name="start_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">End Time</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" value="{{$table->end_time}}" placeholder="" name="end_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Bet Time</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" value="{{$table->bet_time}}" placeholder="" name="bet_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Win Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->home_ratio}}" name="home_ratio">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Win Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->guest_ratio}}" name="guest_ratio">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Tie Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->tie_ratio}}" name="tie_ratio">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Score</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->home_score}}" name="home_score">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Score</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" id="" placeholder="" value="{{$table->guest_score}}" name="guest_score">
                           </div>
                       </div>
                       @endif
                       
                       <div class="form-group">
                          <label for="" class="col-md-4 control-label">Permision</label>
                            <div class="col-md-8">
                              <select class="form-control" id="" name="permision" value="{{$table->permision}}">
                                @if($table->permision=='private') <option name="private">private</option>@endif
                                <option name="pulic">public</option>
                              </select>
                            </div>
                      </div>
                       <div class="form-group">

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" method="post">
                                        <i class="fa fa-btn fa-edit"></i> MODIFY MATCH
                                    </button>
                                </div>
                        </div>
                       
                   </form>
                </div>
            </div>
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