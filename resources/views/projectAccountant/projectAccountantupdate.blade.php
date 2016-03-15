@extends('projectAccountant.head')
@section('content')
        <!-- Start Tab Panel -->

<div class="row">
                        <!-- Start Panel -->
<div class="col-md-6 col-lg-8" >
                            <div class="panel panel-default" >

                                <div class="panel-title">
                                    Change Project Details
                                    <ul class="panel-tools">

                                        <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>

                                    </ul>
                                </div>



                                <div class="panel-body">
                                    {!! Form::open(['url'=>'project update','class'=>'form-horizontal']) !!}

                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label form-label">Project Name</label>
                                            <div class="col-sm-8">

                                                <select class="selectpicker" style="width: 50%" name="pronameupdate">

                                                    @foreach($project as $projects)
                                                        <option value="{{$projects->project_id}}">{{$projects->project_name}}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label form-label">Development Team</label>
                                            <div class="col-sm-8">

                                                <select class="selectpicker" style="width: 50%" name="devteamupdate">

                                                    @foreach($devteam as $devteams)
                                                        <option>{{$devteams->dev_team_name}}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label form-label">Qa Team</label>
                                            <div class="col-sm-8">

                                                <select class="selectpicker" style="width: 50%" name="qateamupdate">
                                                    @foreach($qateam as $qateams)
                                                        <option>{{$qateams->qa_team_name}}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label form-label">Project Manager Name</label>
                                            <div class="col-sm-8">
                                                <select class="selectpicker" style="width: 50%" name="pmNameupdate">
                                                    @foreach($userpm as $userpms)
                                                        <option value="{{$userpms->id}}">{{$userpms->first_name}}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label form-label">Consultant Architecture</label>
                                            <div class="col-sm-8">
                                                <select class="selectpicker" style="width: 50%" name="canameupdate">
                                                    @foreach($userac as $useracs)
                                                        <option value="{{$useracs->id}}">{{$useracs->first_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label form-label">Project Accountant</label>
                                            <div class="col-sm-8">
                                                <select class="selectpicker" style="width: 50%" name="panameupdate">
                                                    @foreach($userpa as $userpas)
                                                        <option value="{{$userpas->id}}">{{$userpas->first_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" class="btn btn-default">Update</button>
                                            </div>
                                        </div>

                                    {!! Form::close() !!}
                                </div>

                            </div>
</div>
                        <!-- End Panel -->
    <!-- Start Browser Stats -->
    <div class="col-md-12 col-lg-4">
        <div class="panel panel-widget">
            <div class="panel-title">
              Delete Project
            </div>
            <div class="panel-body">


                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Project </label>
                    <div class="col-sm-10">

                        <select class="selectpicker" style="width: 50%" name="pronameDelete" id="pronameDelete">

                            @foreach($project as $projects)
                                <option value="{{$projects->project_id}}">{{$projects->project_name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <a id="button6" href="#">
                        <button class="btn btn-danger" id="submit">Delete</button>
                        </a>
                    </div>
                </div>

                </a>

            </div>
        </div>
    </div>
    <!-- End Browser Stats -->



</div>
<!--============================================================================== -->
<!--==================== Project delete=========================== -->
<script>
    document.querySelector('#submit').onclick = function(){

        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover the project!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete",
                    cancelButtonText: "No, Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $('#pronameDelete').ready(function(e){
                            console.log(e);
                            var pro_id= $('#pronameDelete').val();
                            $.get('ajax-subcat3?pro_id='+pro_id,function(data){

                                swal("Deleted!", "Your Project has been deleted.", "success");
                                location.reload(true);
                            });
                        });


                    } else {
                        swal("Cancelled", "Your Project  is safe!", "error");
                    }
                });
    };
</script>
<!-- End Tab Panel -->
@stop