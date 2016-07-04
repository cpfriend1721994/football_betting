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
                <div class="panel-heading"><strong>Create Match</strong></div>
                <div class="panel-body">
                   <form action="{{url("matchcreate")}}" method="POST" role="form">
                   {{csrf_field()}}
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Team</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" name="home_team">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Team</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" name="guest_team">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Start Time</label>
                           <div class="col-md-8">
                                <input type="datetime-local" class="form-control" id="" placeholder="" name="start_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">End Time</label>
                           <div class="col-md-8">
                                <input type="datetime-local" class="form-control" id="" placeholder="" name="end_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Bet Time</label>
                           <div class="col-md-8">
                                <input type="datetime-local" class="form-control" id="" placeholder="" name="bet_time">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Home Win Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" name="home_ratio">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Guest Win Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" name="guest_ratio">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Tie Ratio</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="" placeholder="" name="tie_ratio">
                           </div>
                       </div>



                       <div class="form-group">

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" method="post">
                                        <i class="fa fa-btn fa-plus"></i> CREATE MATCH
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