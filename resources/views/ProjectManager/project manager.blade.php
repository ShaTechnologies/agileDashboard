
@extends('ProjectManager.headProjectManager')
@section('content')

<div class="row">



  <div class="col-md-12 col-lg-6" style="width:100%">
    <div class="panel panel-widget">
      <div class="panel-title" >
        Projects Details <span class="label label-warning" >-</span>
        <ul class="panel-tools">
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
        <!--table view of ongoing projects-->
        {!! Form::open(['url'=>'project manager','class'=>'form-horizontal']) !!}
        <table class="table table-hover">
          <thead>
          <tr>
            <td>ID</td>
            <td>Project</td>
            <td>Status</td>
            <td>Release</td>

          </tr>
          </thead>
          <tbody id="test">
          {{--getting the details from the project table--}}
          @foreach($project as $projects)
          <tr>
            <td>{{$projects->project_id}}</td>
            <td>{{$projects->project_name}}</td>

            <?php
            $x=$projects->project_status;
            ?>

            {{--$x refers to the project status--}}
            <?php if ($x==0) { ?>
            <td><span class="label label-warning">pending</span></td>

            <td><span class="label label-warning">Can't Release Project</span></td>
            <?php }
            elseif ($x==1){ ?>
            <td><span class="label label-primary">testing</span></td>

            <td><span class="label label-primary">Processing to release</span></td>
            <?php }
            elseif ($x==2) { ?>
            <td><span class="label label-success">finished</span></td>

            <td><span class="label label-danger">Can be released</span></td>


            <?php } ?>
          </tr>
          @endforeach
          </tbody>
        </table>
        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

{{--Script using ajax--}}



















{{--This is a flash message when we get inserted a comment--}}
    @if(Session::has('flash_message'))
      <div class="kode-alert kode-alert-icon kode-alert-click alert3">
        <a href="#" class="closed">&times;</a>
        Comment has been sucessfully inserted!!
      </div>
    @endif
    <div class="row">


      <!--Add comment form load  -->






    <div class="col-md-12 col-lg-6" style="width:100%"> <!-- Start Ongoing Project with defects -->
      <div class="panel panel-widget">
        <div class="panel-title">
          ONGOING PROJECTS WITH DEFECTS <span class="label label-warning">--</span>
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
          <table class="table table-hover table-striped">
            <thead>
            <tr>
              <td>Id</td>
              <td>Project Name</td>
              <td>Devoloper TeamName</td>
              <td>No Of UserStories</td>
              <td>Defect Density(No Of Defects</td>
            </tr>
            </thead>
            <tbody>
            <tr>

                @foreach($defect as $defects)<!--getting the project and defect details from the database-->
                <tr>
                <td>{{$defects->project_id}}</td>
                <td>{{$defects->project_name}}</td>
                <td>{{$defects->dev_team_name}}</td>
                <td>{{$defects->no_of_user_stories}}</td>
                <td><div class="easypie margin-b-50" data-percent="100"><span>{{$defects->total}}</span></div></td>
                @endforeach
                </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>



  </div>

    <div class="row">  <!-- identifying devoloper and their defects -->

    <div class="col-md-12 col-lg-3">
      <div class="panel panel-widget">
        <div class="panel-title">
          Devoloper     Defects
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          <ul class="basic-list">
            @foreach($dev_defect as $dev_defects)
              <?php
              $y=$dev_defects->total;
              ?>
              <?php if ($y<=2) { ?>
                <li>{{$dev_defects->first_name}} <span class="right label label-default">{{$y}}</span></li>
              <?php }
              elseif ($y>2 && $y<4){ ?>
                <li>{{$dev_defects->first_name}} <span class="right label label-warning">{{$y}}</span></li>
              <?php }
              elseif($y>=4) { ?>
                <li>{{$dev_defects->first_name}} <span class="right label label-danger">{{$y}}</span></li>
              <?php } ?>
            @endforeach
          </ul>
        </div>
      </div>
    </div>


    <div class="col-md-12 col-lg-3" style="width: 12.5%">
    </div>

      <!-- Identifying the QA teams -->
    <div class="col-md-12 col-lg-3">
      <div class="panel panel-info panel-widget">
        <div class="panel-title">
          QA teams
        </div>
        <div class="panel-body">
          <ul class="basic-list image-list">
            @foreach($team as $teams)
              <li><img src="img/profileimg.png" alt="img" class="img">
                <b>{{$teams->qa_team_name}}</b><!--adding qa teams from database-->
                <span class="desc">{{$teams->create_date}}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

@stop
