@extends('master')

@section('content')
  <!-- Start Page Loading -->
<div class="loading" xmlns="http://www.w3.org/1999/html"><img src="img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="/" class="logo">Developer</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->
   {{-- <form class="searchform">
      <input type="text" class="searchbox" id="searchbox" placeholder="Search">
      <span class="searchbutton"><i class="fa fa-search"></i></span>
    </form>--}}
    <!-- End Searchbox -->

    <!-- Start Top Menu -->
    <ul class="topmenu">
      <li><a href="#">Files</a></li>
      <li><a href="#">Authors</a></li>
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">My Files <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Videos</a></li>
          <li><a href="#">Pictures</a></li>
          <li><a href="#">Blog Posts</a></li>
        </ul>
      </li>
    </ul>
    <!-- End Top Menu -->

    <!-- Start Sidepanel Show-Hide Button -->
    <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
          <li><a href="#"><i class="fa falist fa-paper-plane-o"></i>Product or Item</a></li>
          <li><a href="#"><i class="fa falist fa-font"></i>Blog Post</a></li>
          <li><a href="#"><i class="fa falist fa-file-image-o"></i>Image Gallery</a></li>
          <li><a href="#"><i class="fa falist fa-file-video-o"></i>Video Gallery</a></li>
        </ul>
    </li>

    <li class="link">
      <a href="#" class="notifications">6</a>
    </li>

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="{{ Auth::user()->img_url }}" alt="img"><b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li>
          <li><a href="#"><i class="fa falist fa-file-o"></i>Files</a></li>
          <li><a href="#"><i class="fa falist fa-wrench"></i>Settings</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="fa falist fa-lock"></i> Lockscreen</a></li>
          <li><a href="{{ url('/auth/logout') }}"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN</li>
  <li><a href="/"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard<span class="label label-default">2</span></a></li>
  <li><a href="developer"><span class="icon color5"><i class="fa fa-legal"></i></span>Developer<span class="label label-default"></span></a></li>
  <li><a href="project%20manager"><span class="icon color5"><i class="fa fa-area-chart"></i></span>Project Manager<span class="label label-default"></span></a></li>
  <li><a href="qa%20engineer"><span class="icon color5"><i class="fa fa-steam-square"></i></span>QA Engineer<span class="label label-default"></span></a></li>
  <li><a href="project%20Accountant"><span class="icon color5"><i class="fa fa-group"></i></span>Accountant<span class="label label-default"></span></a></li>
</ul>

</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->

  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">





  <!-- Start First Row -->
  <div class="row">
<!---- **************************************************************************************************** -->
    <!-- Start Order Status -->
    <div class="col-md-12 col-lg-6" style="width:100%">
      <div class="panel panel-widget">
        <div class="panel-title">
          ENGAGED PROJECTS <span class="label label-warning">196</span>
          <ul class="panel-tools">
            <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-search">
          <form>
            <input type="text" class="form-control" placeholder="Search...">
            <i class="fa fa-search icon"></i>
          </form>
        </div>


        <div class="panel-body table-responsive">

            <table class="table table-hover table-condensed">
              <thead>
              <tr>
                {{--<td class="text-center"><i class="fa fa-trash"></i></td>--}}
                <td>PROJECT ID</td>
                <td>PROJECT NAME</td>
                <td>PROJECT Status</td>
                <td>Development Team</td>
                <td>DUE DATE</td>
                <td>PROGRESS</td>
              </tr>
              </thead>
              <tbody>

                @foreach($projects as $project)
                <tr data-toggle="modal" data-target="#myModalProject" id="{{$project->project_id}}" name="projects">
                    {{--<td ><div class="checkbox margin-t-0"><input id="checkbox1" type="checkbox"><label for="checkbox1"></label></div></td>--}}
                    <td>#{{$project->project_id}}</td>
                    <td>{{$project->project_name}}</td>

                    @if($project->project_status === 0)
                      <td><span class="label label-default">Developing</span></td>

                    @elseif($project->project_status === 1)
                      <td> <span class="label label-warning">Designing</span></td>

                    @elseif($project->project_status === 2)
                      <td><span class="label label-info">Testing</span></td>

                    @elseif($project->project_status === 3)
                      <td><span class="label label-danger">Canceled</span></td>
                    @endif

                    <td>{{$project->dev_team_name}}</td>
                    <td>{{$project->due_date}}</td>

                  <?php
                  $percentage = ($project->no_of_compl_user_stories / $project->no_of_user_stories * 100);
                  $percentage = round($percentage);
                  ?>

                    <td><div class="easypie margin-b-50" data-percent="{{ $percentage}}">
                        <span>{{$percentage}}%</span></div></td>
                </tr>
                @endforeach

              </tbody>
            </table>

          <script>

            $('.table').find('tr').click(function(e){
              console.log(e);
              var id = $(this).text();
              var project_id = id.split('\n')[1];
              project_id = project_id.split('#')[1];

              $.get('/ajax-get_project_id?project_id='+ project_id, function(data){
                $('#projectID').text(data['projects'][0].project_id)
                $('#projectName').text(data['projects'][0].project_name)
                $('#noOfUserStories').text(data['projects'][0].no_of_user_stories)
                $('#noOfCompUserStories').text(data['projects'][0].no_of_compl_user_stories)
                $('#descrip').text(data['projects'][0].description)
                $('#startDate').text(data['projects'][0].start_date)
                $('#endDate').text(data['projects'][0].due_date)

                //this for project Management
                $('#projectManageName').text(data['projects'][0].project_name)
                $('#projectManager').text(data['projectManager'][0].first_name + " " + data['projectManager'][0].last_name)
                $('#consultantArchitechture').text(data['consultant'][0].first_name + " " + data['consultant'][0].last_name)
                $('#projectAccountant').text(data['projectAccountant'][0].first_name + " " + data['projectAccountant'][0].last_name)

                getDevTeam(data);
                getQATeam(data);
                ///////////////////
              });
            });

              function getDevTeam(data) {
              var trHtml = '';

              $('#popUpDevelopmentTeam').text('');
              var head = '<thead><tr><td>Developer</td><td>Developer Name</td></tr></thead>';
              $('#popUpDevelopmentTeam').append(head);
              $.each(data['developmentTeam'], function (i, dataSet) {

                trHtml += '<tr><td>' +data['developmentTeam'][i].id +'</td><td>' + data['developmentTeam'][i].first_name + ' ' + data['developmentTeam'][i].last_name + '</td></trclas>'
              });
              $('#popUpDevelopmentTeam').append(trHtml);
            }

            function getQATeam(data) {
              var trHtml = '';

              $('#popUpQATeam').text('');
              var head = '<thead><tr><td>QA Engineer</td><td>QA Engineer Name</td></tr></thead>';
              $('#popUpQATeam').append(head);
              $.each(data['qaTeams'], function (i, dataSet) {

                trHtml += '<tr><td>' +data['qaTeams'][i].id +'</td><td>' + data['qaTeams'][i].first_name + ' ' + data['qaTeams'][i].last_name + '</td></trclas>'
              });
              $('#popUpQATeam').append(trHtml);
            }

          </script>




      </div>
    </div>
  </div>
      <!-- End Order Stats -->

  </div>
  <!-- End First Row -->
  <!---- **************************************************************************************************** -->



  <!-- Start Second Row -->

  <div class="row">

    <!-- Start Server Status -->
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-widget" style="height:380px;">
        <div class="panel-title">
          BURNDOWN CHART <span class="label label-default">196</span>
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body">

          <ul class="widget-inline-list clearfix">
            <li class="col-3 color10" id="chrtTotUserStories"><span>150</span>Total User Stories</li>
            <li class="col-3" id="chrtComUserStories"><span>92</span>Completed</li>
            <li class="col-3 color7" id="remainUserStories"><span>58</span>Remaining</li>
            <li class="col-3" id="remainDays"><span>20 Days</span>Time Left</li>
          </ul>

          <div id="realtime" class="flotchart-placeholder" style="height:190px;"></div>
        </div>
      </div>
    </div>
    <!-- End Server Status -->

       {{-- <script>

        $('.table').find('tr').click(function(e){
          console.log(e);
          var id = $(this).text();
          var project_id = id.split('\n')[1];
          project_id = project_id.split('#')[1];

          $.get('/ajax-get_chart?project_id='+ project_id, function(data){
            $('#projectID').text(data['projects'][0].project_id)
            $('#projectName').text(data['projects'][0].project_name)
            $('#noOfUserStories').text(data['projects'][0].no_of_user_stories)
            $('#noOfCompUserStories').text(data['projects'][0].no_of_compl_user_stories)

      </script>
--}}
    <!-- Start Inbox -->
    <div class="col-md-12 col-lg-3">
      <div class="panel panel-widget">
        <div class="panel-title">
          Inbox <span class="label label-danger">9</span>
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body">

        <ul class="mailbox-inbox">
            @foreach($notifyEmails as $notifyEmail)
            <li>
              <a href="#" class="item clearfix">
                <img src="img/profileimg.png" alt="img" class="img">
                {{--<span class="from">QA Engineer</span>--}}
                <p>Assign Defect ID : {{$notifyEmail->defect_id}}</p>
                <p>Date :{{$notifyEmail->created_at}}</p>
              </a>
            </li>
            @endforeach
        </ul>

        </div>
      </div>
    </div>
    <!-- End Inbox -->

    <!-- Start Teammates -->
    <div class="col-md-12 col-lg-3">
      <div class="panel panel-info panel-widget">
        <div class="panel-title">
          Teammates
        </div>
        <div class="panel-body">
          <ul class="basic-list image-list">
            <li><img src="img/pa.jpg" alt="img" class="img"><b>Praveen Gunathilaka</b><span class="desc">Designer</span></li>
            <li><img src="img/pm.png" alt="img" class="img"><b>Archchana</b><span class="desc">Front-End Developer</span></li>
            <li><img src="img/qa.png" alt="img" class="img"><b>Shavindra Manathunga</b><span class="desc">Back-End Developer</span></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Teammates -->
  </div>
  <!-- End Second Row -->

  {{--  ******************************************************************************************************************  --}}
  <!--Start table-->
  <div class="row">


    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Raised Defects
        </div>
        <div class="panel-body table-responsive">

         {{-- {!! Form::open() !!}--}}
          <table id="example" class="table table-hover table-condensed"{{--class="table display"--}}>
            <thead>
            <tr>
              <th>Defect ID</th>
              <th>Title</th>
              <th>Project Name</th>
              <th>Priority Level</th>
              <th>Raised Date</th>
              <th>Raised Time</th>
              <th></th>
              <th></th>
            </tr>
            </thead>

            <tfoot>
            <tr>
              <th>Defect ID</th>
              <th>Title</th>
              <th>Project Name</th>
              <th>Priority Level</th>
              <th>Raised Date</th>
              <th>Raised Time</th>
              <th></th>
              <th></th>
            </tr>
            </tfoot>

            <tbody>
           @foreach($defects as $defect)
            <tr data-toggle="modal" data-target="#myModalDefect">
              <td>#{{$defect->defect_id}}</td>
              <td>{{$defect->title}}</td>
              <td>{{$defect->project_name}}</td>

              @if($defect->priority_level == 1)
                <td><span class="label label-danger">P1</span></td>
              @elseif($defect->priority_level == 2)
                <td><span class="label label-warning">P2</span></td>
              @elseif($defect->priority_level == 3)
                <td><span class="label label-info">P3</span></td>
              @else
                <td><span class="label label-info">P4</span></td>
              @endif

              <td>{{$defect->raised_date}}</td>
              <td>{{$defect->raised_time}}</td>
              <td><button type="button" class="btn btn-default">Response</button></td>
            </tr>
           @endforeach

            </tbody>
          </table>
         {{-- {!! Form::close() !!}--}}

        </div>

        <script>
          $('#example').find('tr').click(function(e){
            console.log(e);
            var id = $(this).text();
            var defect_id = id.split('\n')[1];
            defect_id = defect_id.split('#')[1];

            $.get('/ajax-get_defect_id?defect_id='+ defect_id, function(data){
              $('#defectID').text(data['defects'][0].defect_id)
              $('#prjName').text(data['projects'][0].project_name)
              $('#qaEng').text(data['qaEngineers'][0].first_name + " " + data['qaEngineers'][0].last_name)
              $('#title').text(data['defects'][0].title)
              $('#descript').text(data['defects'][0].description)
              $('#attachment').text(data['defects'][0].attachment_url)

            });
          });

        </script>

      </div>
    </div>
    <!-- End Panel -->



  </div>
  <!--End table-->
{{-- *********************************************************************************************************************** --}}
</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Start Footer -->
<div class="row footer">

</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
{{--side panel--}}


{{--This is for response button click event--}}
           {{-- <script>
              $(document).ready(function(){
                $('.myform').click(function(e){
                  e.preventDefault();
                  $.ajax({
                    url: "developer",
                    type: "post"
                  });
                });
              });
            </script>--}}


@stop