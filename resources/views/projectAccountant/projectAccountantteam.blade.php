@extends('projectAccountant.head')
@section('content')
        <!-- This will handle form validations -->
<div class="row">
    @if(Session::has('validateDev_message'))
        <div class="kode-alert kode-alert-icon kode-alert-click alert6">
            <i class="fa fa-lock"></i>

                <li> field cant be empty</li>

        </div>
    @endif

</div>
@if(Session::has('flash_message'))
    <script>
        $(document).ready(function() {
            swal("Error!", "You have already added this team", "error");

        });
    </script>
    @endif
@if(Session::has('team_message'))
    <script>
        $(document).ready(function() {
            swal("Sucessful!", "Sucessfully Inserted!", "success");

        });
    </script>
    @endif
        <!-- Start Row -->
<div class="row">

    <!-- Start Dev Panel -->
    <div class="col-md-6 col-lg-4" style="width: 50%">
        <div class="panel panel-default">
            <div class="panel-title">
                <i class="fa fa-male "></i><i class="fa fa-male "></i> Development Team
            </div>
            <!-- This is development team registration form -->
            {!! Form::open(['url'=>'project team','class'=>'form-horizontal']) !!}

                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input name="qatoken" type="hidden" value="teamdev"/>
             <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="deteamName" id="deteamName">
                    </div>
                </div>
                <div class="form-group">
                    <div class="top-right">
                        <button  type="submit" class="btn btn-default">Add</button>
                    </div>
                </div>
             </div>
            {!! Form::close() !!}
                    <!-- End of development team registration form -->
        </div>
    </div>
    <!-- End Dev Panel -->

    <!-- Start Qa Panel -->
    <div class="col-md-6 col-lg-4" style="width: 50%">
        <div class="panel panel-default">

            <div class="panel-title">
                <i class="fa fa-male "></i><i class="fa fa-male "></i><i class="fa fa-male "></i> QA Team
            </div>

            <!-- This is QA team registration form -->
            {!! Form::open(['url'=>'project team','class'=>'form-horizontal']) !!}

                <input name="_token1" type="hidden" value="{{ csrf_token() }}"/>
                <input name="qatoken" type="hidden" value="teamqa"/>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="qateamName" id="qateamName">
                    </div>
                </div>
                <div class="form-group">
                    <div class="top-right">
                        <button type="submit" class="btn btn-default">Add</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
                    <!-- End of QA team registration form -->
        </div>
    </div>
    <!-- End Qa Panel -->

</div>
      <!-- End Row -->

<!-- Start Row -->
<div class="row">
    <!-- Start Devteam Stats -->
    <div class="col-md-12 col-lg-3" style="width: 50%">
        <div class="panel panel-widget">
            <div class="panel-title">
                Dev Teams
                <ul class="panel-tools panel-tools-hover">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                    <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <!-- Dev team and team count -->
                <ul class="basic-list">
                   @foreach($user_devteam as $user_devteams)
                        <li> {{$user_devteams->dev_team_name}}<span class="right label label-default">{{$user_devteams->total}}</span></li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    <!-- End Devteam Stats -->

    <!-- Start Qateam Stats -->
    <div class="col-md-12 col-lg-3" style="width: 50%">
        <div class="panel panel-widget">
            <div class="panel-title">
                QA Teams
                <ul class="panel-tools panel-tools-hover">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                    <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <!-- QA team and team count -->
                <ul class="basic-list">
                    @foreach($user_qateam as $user_qateams)
                        <li> {{$user_qateams->qa_team_name}}<span class="right label label-success">{{$user_qateams->total}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- End Qateam Stats -->
    </div>
    <!-- End Row -->
<!-- Script of team add acknowledgement -->

<!--==================== Alert box=========================== -->
<script src="js/kode-alert/main.js"></script>
<!--============================================================================== -->
@stop