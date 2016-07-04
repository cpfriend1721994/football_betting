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
                    <li><a>All Users Information</a></li>

                </ul>
            </div>
            <div class="contmid">
                <div class="bxcont">
                    <div class="croll_tb">
                        <table class="table table-hover" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Money</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Updated At</th>
                                    <th class="text-center">User Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $row)
                                    
                                <tr>
                                    <td class="text-center">{{$row->name}}</td>
                                    <td class="text-center">{{$row->email}}</td>
                                    <td class="text-center">{{$row->money}}</td>
                                    <td class="text-center">{{$row->created_at}}</td>
                                    <td class="text-center">{{$row->updated_at}}</td>
                                    <td class="text-center"><a href="{{url('user')}}/{{$row->id}}">
                                        <span class="glyphicon glyphicon-user"></span>
                                        </a></td>
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