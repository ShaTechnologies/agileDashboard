@extends('projectAccountant.head')
@section('content')

        <!-- This will handle database sucessfull message -->
@if(Session::has('flash_message'))
  <script>
    //This script will display a sucessfull message
    $(document).ready(function() {
      swal("Done!", "Sucessfully Inserted!", "success")
    });
  </script>
@endif

  <!-- This will handle form validations -->
  <div class="row">
  @if($errors->any())
    <div class="kode-alert kode-alert-icon kode-alert-click alert6">
      <i class="fa fa-lock"></i>
      @foreach($errors->all()as $error)
              <li>{{$error}}</li>
      @endforeach
    </div>
  @endif
  </div>

  <div class="row">

    <!-- Form Start   -->
    <div class="col-md-6 col-lg-4" style="width: 100%">
      <div class="panel panel-default">
        <div class="panel-title">
          Project Form

        </div>

        {!! Form::open(['url'=>'project Accountant','class'=>'form-horizontal']) !!}

        <div class="panel-body" >

          <!-- Form Basic Details -->
              <div class="col-md-6 col-lg-4" style="width: 50%" >
            <div class="panel panel-default">
              <div class="panel-title">
                Basic Details

              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label form-label">Project Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="pname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label form-label">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label form-label">UserStories</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="userstories">
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <!-- Form Responsibilites Details -->
              <div class="col-md-6 col-lg-4" style="width: 50%" >
            <div class="panel panel-default" >
              <div class="panel-title">
                Assign Responsibles
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label class="col-sm-5 control-label form-label">Project Manager Name</label>
                    <div class="col-sm-7">
                      <select class="selectpicker" style="width: 50%" name="pmName">
                        @foreach($userpm as $userpms)
                          <option value="{{$userpms->id}}">{{$userpms->first_name}}</option>

                        @endforeach
                      </select>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label form-label">Consultant Architecture</label>
                    <div class="col-sm-7">
                      <select class="selectpicker" style="width: 50%" name="caname">
                        @foreach($userac as $useracs)
                          <option value="{{$useracs->id}}">{{$useracs->first_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label form-label">Project Accountant</label>
                    <div class="col-sm-7">
                      <select class="selectpicker" style="width: 50%" name="paname">
                        @foreach($userpa as $userpas)
                          <option value="{{$userpas->id}}">{{$userpas->first_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <!-- Form Development Team  -->
              <div class="col-md-6 col-lg-4" style="width: 100%">
            <div class="panel panel-default">
              <div class="panel-title">
                Select Development Team
              </div>
              <div class="panel-body">
                <div class="panel panel-default">
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Development Team</label>
                    <div class="col-sm-10">
                      <select class="selectpicker" style="width: 50%" name="devteam" id="devteam">
                        <option></option>
                        @foreach($devteam as $devteams)
                          <option>{{$devteams->dev_team_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Dev Teammates -->
              <div class="panel panel-info panel-widget">
                <div class="panel-title" id="devtitle">
                    <b>Development Team</b>
                </div>
                <div class="panel-body">
                  <ul class="basic-list image-list" name="devteamsub" id="devteamsub">
                    <li value=""><img src=""></li>
                  </ul>
                </div>
              </div>
              <!-- End Dev Teammates -->
            </div>

          </div>

          <!-- Form QA Team  -->
              <div class="col-md-6 col-lg-4" style="width: 100%">
            <div class="panel panel-default">
              <div class="panel-title">
                Select QA Team
              </div>
              <div class="panel-body">
                <div class="panel panel-default">
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">QA Team</label>
                    <div class="col-sm-10">
                      <select class="selectpicker" style="width: 50%" name="qateam" id="qateam">
                        <option></option>
                        @foreach($qateam as $qateams)
                          <option>{{$qateams->qa_team_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start QA Teammates -->
              <div class="panel panel-success">
                <div class="panel-title" id="qatitle">
                  <b> QA Team</b>
                </div>
                <div class="panel-body">
                  <ul class="basic-list image-list" name="qateamsub" id="qateamsub">
                    <li value=""><img src=""></li>
                  </ul>
                </div>
              </div>
              <!-- End QA Teammates -->
            </div>

          </div>

          <!-- Form Submit Button  -->
              <div class="form-group">
            <div class="top-right">
              <button type="submit" class="btn btn-default">Finish</button>
            </div>
          </div>

        </div>

        {!! Form::close() !!}
      </div>
    </div>

  </div>








  <!--============================================================================== -->
  <!--====================Load Dev team On combobox chnage AJAX=========================== -->

<script type="text/javascript">
  $('#devteam').on('change',function(e){
    console.log(e);
    var cat_id= e.target.value;
    $.get('ajax-subcat?cat_id='+cat_id,function(data){
      $('#devteamsub').empty();
      $.each(data,function(index,subcatObj){
        $('#devteamsub').append('<li value="'+subcatObj.id+'"><img src="'+subcatObj.img_url+'" alt="img" class="img"><b>'+subcatObj.first_name+'</b></li>');

      });

    });
  });
</script>

  <!--============================================================================== -->
  <!--====================Load QA team On combobox chnage AJAX=========================== -->

<script type="text/javascript">
  $('#qateam').on('change',function(e){
    console.log(e);
    var cat_id= e.target.value;
    $.get('ajax-subcat2?cat_id='+cat_id,function(data){
      $('#qateamsub').empty();
      $.each(data,function(index,subcatObj){
        $('#qateamsub').append('<li value="'+subcatObj.id+'"><img src="'+subcatObj.img_url+'" alt="img" class="img"><b>'+subcatObj.first_name+'</b></li>');

      });

    });
  });
</script>

  <!--============================================================================== -->
  <!--==================== Alert box=========================== -->
<script src="js/kode-alert/main.js"></script>
  <!--============================================================================== -->


@stop




