@extends('ProjectManager.headProjectManager')
@section('content')


    <div id="popup1" class="overlaypop">
    <div class="popup">

        <a class="closepop" href="#">&times;</a>
        <br>
        <div class="contentpop">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-title">
                        Comments

                    </div>

                    <div class="panel-body">
                        <!--opening a form to add comment on a defect-->
                        <!--when submitting this form it refers to projec manager page-->
                        {!! Form::open(['url'=>'insert details','class'=>'form-horizontal']) !!}
                        <input name="_token" type="hidden" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="input002" class="col-sm-2 control-label form-label">DefectId</label>
                            <div class="col-sm-2">
                                <select name="defectId" id="defectId" data-live-search="true" class="input-sm form-control">
                                    @foreach($defectid as $defectids) <!--This is a combo box to get defectId-->
                                    <option value="{{$defectids->defect_id}}">{{$defectids->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input002" class="col-sm-2 control-label form-label">Comment Subject</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">Comment Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  name="description">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Add Comment</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        @if($errors->any())<!--validating the form-->
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



    <div class="col-md-12 col-lg-4">
        <div class="panel panel-widget">
            <div class="panel-title">
                Release Project
            </div>
            <div class="panel-body">
                {!! Form::open(['url'=>'insert details','class'=>'form-horizontal']) !!}

                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label class="col-sm-3 control-label form-label">Releasable Project </label>
                    <div class="col-sm-9">

                        <select class="selectpicker" style="width: 50%" name="pronameRelease" id="pronameRelease">

                            @foreach($project_id as $project_ids)
                                <option value="{{$project_ids->project_id}}">{{$project_ids->project_name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <a id="button6" href="#">
                            <button class="btn btn-danger" id="submitRelease">Release</button>
                        </a>
                    </div>
                </div>

                </a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>







    <script>
        document.querySelector('#submitRelease').onclick = function(){

            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover the project!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Release",
                        cancelButtonText: "No, Cancel",
                        closeOnConfirm: false,
                      //  closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $('#pronameRelease').ready(function(e){
                                console.log(e);
                                var pro_id= $('#pronameRelease').val();
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




    <div class="col-md-6">
        <div class="panel panel-default">

            <div class="panel-title">
                Project Team
            </div>

            <div class="panel-body">
                <form class="fieldset-form">
                    <fieldset>
                        <legend>Create Project Team</legend>


                        <div class="form-group">
                            <label for="example11" class="form-label">Team name:</label>
                            <input type="text" class="form-control" id="example11">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label form-label">Member 1:</label>
                            <div class="col-sm-8">
                                <select class="selectpicker">
                                    <option>Themeforest</option>
                                    <option>Codecanyon</option>
                                    <option>Photodune</option>
                                    <option>Graphicriver</option>
                                    <option>Activeden</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label form-label">Member 2:</label>
                            <div class="col-sm-8">
                                <select class="selectpicker">
                                    <option>Themeforest</option>
                                    <option>Codecanyon</option>
                                    <option>Photodune</option>
                                    <option>Graphicriver</option>
                                    <option>Activeden</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label form-label">Member 3:</label>
                            <div class="col-sm-8">
                                <select class="selectpicker">
                                    <option>Themeforest</option>
                                    <option>Codecanyon</option>
                                    <option>Photodune</option>
                                    <option>Graphicriver</option>
                                    <option>Activeden</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Create Team</button>
                    </fieldset>
                </form>

            </div>

        </div>
    </div>








@stop