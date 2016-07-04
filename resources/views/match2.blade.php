@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-13 col-md-offset-0">
                    {{-- @if(Session::has('errors'))
                      <div class="alert alert-danger">
                            {{Session::get('errors')}}
                      </div>
                    @endif --}}
                    {{-- @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif --}}
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


                        <table class="table table-hover" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">Match</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Result</th>
                                    <th class="text-center" width="130">Home Win</th>
                                    <th class="text-center" width="130">Guest Win</th>
                                    <th class="text-center" width="130">Tie</th>
                                    <th class="text-center">Permision</th>
                                    <th class="text-center">Modify</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $row)
                                    
                                <tr>
                                    <?php
                                        $count1 = DB::table('bets')->where('choose','home')->where('match_id',$row->id);
                                        $count2 = DB::table('bets')->where('choose','guest')->where('match_id',$row->id);
                                        $count3 = DB::table('bets')->where('choose','tie')->where('match_id',$row->id);
                                        $time1=strtotime($row->start_time);
                                        $time2=strtotime($row->end_time);
                                        $matchstatus='going on';
                                        if(time() < $time1) $matchstatus = 'not started';
                                        if(time() > $time2) $matchstatus = 'done';
                                        if((time() > $time2)&&($row->status==0)) $matchstatus = 'update result';
                                    ?>
                                    <td class="text-center"><a href="{{url('matchdetail')}}/{{$row->id}}">{{$row->home_team}} - {{$row->guest_team}}</a></td>
                                    @if($matchstatus == 'update result')
                                    <td class="text-center"><font color="red" data-toggle="modal" data-target="#f" >{{$matchstatus}}</font></td>

{{-- Modal form --}}
<div class="modal fade" id="MatchResultModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Result</h4>
        </div>
        <div class="modal-body">
          <form action="{{url("match2")}}/{{$row->id}}" method="POST" role="form">
                   {{csrf_field()}}                
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Score</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="" name="home_score">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Score</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" value="" name="guest_score">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label"></label>
                           <div class="col-md-8">
                                <input type="hidden" class="form-control" id="" placeholder="" value="1" name="status">
                           </div>
                       </div>
                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" method="post">
                                    <i class="fa fa-btn fa-plus"></i> UPDATE
                                </button>
                            </div>
                        </div> 
                   </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
      
    </div>
  </div>
{{-- Modal form --}}

                                    @else
                                    <td class="text-center">{{$matchstatus}}</td>
                                    @endif
                                    <td class="text-center">{{$row->home_score}} - {{$row->guest_score}}</td>
                                    <td class="text-center">1/{{$row->home_ratio}} - ({{$count1->count()}} bets)</td>
                                    <td class="text-center">1/{{$row->guest_ratio}} - ({{$count2->count()}} bets)</td>
                                    <td class="text-center">1/{{$row->tie_ratio}} - ({{$count3->count()}} bets)</td>
                                    <td class="text-center">{{$row->permision}}</td>
                                    <td class="text-center"><a href="{{url('matchmodify')}}/{{$row->id}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        </a></td>
                                    <td class="text-center"><a href="{{url('match2')}}/{{$row->id}}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        </a></td>
                                </tr>   
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection