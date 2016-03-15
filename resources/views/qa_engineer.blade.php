<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
    <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive,"/>
    <title>QA Engineer</title>

    <!-- ========== Css Files ========== -->
    <link href="{{URL::asset('css/root.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">


    {{--///////////////////////////// this import is used for AJAX actions /////////////////////////////////////--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    {{--/////////////////// following block of code is for Raise Defect Popup Styles ///////////////////////////--}}
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
</head>


<body>

<!-- Start Page Loading -->
<div class="loading"><img src="img/loading.gif" alt="loading-img"></div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START TOP -->
<div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
        <a href="/" class="logo">QA Engineer</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    {{-- Upper Content Removed #1--}}

    {{--Upper Content End--}}

    <!-- Start Top Right -->
    <ul class="top-right">
        <button type="button" class="btn btn-rounded btn-danger" data-toggle="modal" data-target="#myModal">Raise an
            Defect
        </button>

        <li class="link">
            <a href="#" class="notifications">6</a>
        </li>

        <li class="dropdown link">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="{{ Auth::user()->img_url }}"
                                                                                       alt="img">
                <b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b><span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                <li role="presentation" class="dropdown-header">Profile</li>
                <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a>
                </li>
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

<!-- ///////////////////////////////// Raise Defect Modal ////////////////////////////////////////////////////-->
{{--#RDModal--}}
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Raise A Defect</h4>
            </div>

            {{--<form method="POST" class="form-horizontal">--}}
            {!! Form::open(['url'=>'qa_engineer', 'class'=>'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="panel panel-default">

                                <div class="panel-title">
                                    Defect Details
                                </div>

                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label form-label">Project</label>
                                        <div class="col-sm-8">
                                            <select name="project" id="project" data-live-search="true"
                                                    class="input-sm form-control">
                                                @foreach($projects as $project) <!-- This for loop loads data to Combobox-->
                                                <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                                <!-- #shaTagTop-->
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label form-label">Developer</label>
                                        <div class="col-sm-8">
                                            <select name="developers" id="developers" class="input-sm form-control">
                                                <option>Select Developer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label form-label">Defect Priority</label>
                                        <div class="col-sm-4">
                                            <select name="defectPriorities" id="defectPriorities"
                                                    class="input-sm form-control">
                                                <option>Select Priority</option>
                                                <option value="1">P1</option>
                                                <option value="2">P2</option>
                                                <option value="3">P3</option>
                                                <option value="4">P4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label form-label">Title</label>
                                        <div class="col-sm-8">
                                            <input id="defectTitle" name="defectTitle" type="text" class="form-control" id="input002">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label form-label">Message</label>
                                        <div class="col-sm-8">
                                            <textarea id="defectDescription" name="defectDescription" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-title">
                                    Project Responsible Persons
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6  control-label form-label">Project Manager</label>
                                    <div class="col-sm-6">
                                        <p id="project_manager" class="form-control-static">...</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6  control-label form-label">Consultant Architecture</label>
                                    <div class="col-sm-6">
                                        <p id="architect" class="form-control-static">...</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6  control-label form-label">Accountant</label>
                                    <div class="col-sm-6">
                                        <p id="accountant" class="form-control-static">...</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel
                    </button>
                    <button type="submit" class="btn btn-info btn-default pull-right" data-target="modal"><span
                                class="glyphicon glyphicon-ok"></span> Raise
                    </button>
                </div>
            {!! Form::close() !!}
           {{-- </form>--}}
        </div>

    </div>

    <script>

        $('#project').on('change', function (e) {
            console.log(e);

            var project_id = e.target.value;

            $.get('/ajax-dev_first_name?project_id=' + project_id, function (data) {
                $('#developers').empty();
                $.each(data, function (combo, dataSet) {
                    $('#developers').append('<option value="' + dataSet.id + '">' + dataSet.first_name + '</option>');
                });

            });

            $.get('/ajax-project_details?project_idi=' + project_id, function (data1) {
                $('#project_manager').text('');
                $('#architect').text('');
                $('#accountant').text('');

                $('#project_manager').text(data1['project_manager'][0].first_name);
                $('#architect').text(data1['consultant'][0].first_name);
                $('#accountant').text(data1['accountant'][0].first_name);

            });
        });
    </script>
</div>

<!-- //////////////////////////////// Raise Defect Modal End //////////////////////////////////////////////// -->


<!-- ////////////////////////////// Project Statitics Madal Start/////////////////////////////////////////////-->
{{--#PSModal--}}
<div class="modal fade" id="modalProjectStat" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Project Statistics</h4>
            </div>

            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="row">

                        <!-- Start Tab Panel -->
                        <div class="col-md-12 col-lg-10 padding-0">
                            <div class="panel panel-transparent">
                                <div class="panel-body">
                                    <div role="tabpanel">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-line" role="tablist">
                                            <li role="presentation" class="active"><a href="#home5"
                                                                                      aria-controls="home5" role="tab"
                                                                                      data-toggle="tab">Project
                                                    Details</a></li>
                                            <li role="presentation"><a href="#profile5" aria-controls="profile5"
                                                                       role="tab" data-toggle="tab">Defects</a></li>
                                            <li role="presentation"><a href="#messages5" aria-controls="messages5"
                                                                       role="tab" data-toggle="tab">Developers</a></li>
                                            <li role="presentation"><a href="#messages6" aria-controls="messages6"
                                                                       role="tab" data-toggle="tab">QA Team</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="home5">
                                                {{--body of panal 1 Project Details--}}
                                                    <label class="col-sm-5  control-label form-label">Project ID</label>
                                                    <div class="col-sm-6">
                                                        <p id="stat_prjID" class="form-control-static">...</p>
                                                    </div>

                                                    <label class="col-sm-5  control-label form-label">Project
                                                        Name</label>
                                                    <div class="col-sm-6">
                                                        <p id="stat_prjName" class="form-control-static">...</p>
                                                    </div>

                                                    <label class="col-sm-5  control-label form-label">Project
                                                        Manager</label>
                                                    <div class="col-sm-6">
                                                        <p id="stat_prjManager" class="form-control-static">...</p>
                                                    </div>

                                                    <label class="col-sm-5  control-label form-label">Project
                                                        Consultant</label>
                                                    <div class="col-sm-6">
                                                        <p id="stat_prjConsultant" class="form-control-static">...</p>
                                                    </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="profile5">
                                                {{--body of panal 2 Defects--}}
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="messages5">
                                                <!-- Start Panel -->
                                                <table  id="stat_tbl_developer" class="table">
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="messages6">
                                                <!-- Start Panel -->
                                                <table id="stat_tbl_QA" class="table">
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                                <!-- End Panel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Panel -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-white btn-default pull-right" data-dismiss="modal"><span
                                class="glyphicon glyphicon-cancel"></span> close
                    </button>

                </div>
            </form>
        </div>

    </div>

    <script>

    </script>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<!-- START SIDEBAR -->
<div class="sidebar clearfix">

    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN</li>
        <li><a href="/"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard<span
                        class="label label-default">2</span></a></li>
        <li><a href="developer"><span class="icon color5"><i class="fa fa-legal"></i></span>Developer<span
                        class="label label-default"></span></a></li>
        <li><a href="project%20manager"><span class="icon color5"><i class="fa fa-area-chart"></i></span>Project Manager<span
                        class="label label-default"></span></a></li>
        <li><a href="qa%20engineer"><span class="icon color5"><i class="fa fa-steam-square"></i></span>QA Engineer<span
                        class="label label-default"></span></a></li>
        <li><a href="project%20Accountant"><span class="icon color5"><i class="fa fa-group"></i></span>Accountant<span
                        class="label label-default"></span></a></li>

    </ul>

</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTENT -->
<div class="content">

    <!-- Start Page Header -->

    <!-- End Page Header -->


    <!-- ///////////////////////// This Div show validation errors //////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    <div class="container-widget">

        <div class="row">

            <!-- start first row-->
            <!-- Start Top Stats -->
            {{--#validation result--}}

            <div class="col-md-12">
               @if ($errors->any())
                 <ul class="alert alert-danger">
                     @foreach($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
               @endif

                @if(Session::has('flash_message'))

                       <script>
                           $(document).ready(function(){
                               swal("Defect Raised", "Defect Submitted to Developer Successfully", "success");
                           });
                       </script>

                @endif

            </div>
            <!-- End Top Stats -->
            <!-- End first row-->

        </div>
        <!-- START Second row -->

        <!-- Start Project Stats -->
        <div class="col-md-12 col-lg-6" style="width:100%">
            <div class="panel panel-widget">
                <div class="panel-title">
                    Projects Stats <span class="label label-warning">{{ $projects->count() }}</span>
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

                    <table id="tblProjectStat" class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Project</td>
                            <td>Status</td>
                            <td>Number of Defects</td>
                            <td>Fixed Defects</td>
                        </tr>
                        </thead>

                        <tbody id="test">
                        {{--
                            @param $projects - Project details that returned from Middleware
                        --}}
                        @foreach($projects as $project)

                            <?php
                            $color = array("label label-warning", "label label-info", "label label-primary", "label label-danger");
                            $msg = "";
                            $ind = 0;
                            if ($project->project_status == 0) {
                                $msg = "Pending";
                            } else if ($project->project_status == 1) {
                                $msg = "Testing";
                            } else if ($project->project_status == 2) {
                                $msg = "Test Completed";
                            } else {
                                $msg = "Canceled";
                            }
                            ?>
                            <tr id={{ $project->project_id }} data-toggle="modal" data-target="#modalProjectStat">
                                <td>#{{ $project->project_id }}</td>
                                <td>{{ $project->project_name }}</td>
                                <td><span class="{{ $color[$project->project_status] }}">{{ $msg }}</span></td>
                                <td class="text-center">99</td>
                                <td class="text-center">
                                    78</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <script> /*#Test*/

                $('#test').find('tr').click(function (e) {
                    console.log(e);
                    var id = $(this).text();
                    var project_id = id.split('\n')[1];
                    project_id = project_id.split('#')[1];

                    $.get('/ajax-selected_project_details?project_id=' + project_id, function (data) {
                        $('#stat_prjID').empty();
                        $('#stat_prjName').empty();

                        $('#stat_prjID').text('#'+data['project'][0].project_id);
                        $('#stat_prjName').text(data['project'][0].project_name);
                        $('#stat_prjManager').text(data['project_manager'][0].first_name + " " + data['project_manager'][0].last_name);
                        $('#stat_prjConsultant').text(data['consultant'][0].first_name + " " + data['consultant'][0].last_name);
                        createQATable(data);
                        createDevTable(data);

                    });
                });

                // data - contain json response from the routes.php
                // create the Dynamic Developer Table
                function createDevTable(data){
                    var trHtml = '';
                    totalDefect = getTotalDefects(data);

                    $('#stat_tbl_developer').text('');
                    var head = '<thead><tr><td>Developer</td><td>Number of Defects</td><td>Defect Density</td></tr></thead>';
                    $('#stat_tbl_developer').append(head);
                    $.each(data['developers'], function (i, dataSet) {

                        trHtml +='<tr class='+ getColor(totalDefect, data['defectCount'][i].defect_count)+'><td>' +
                                data['developers'][i].first_name+'</td><td>' +data['defectCount'][i].defect_count+'</td>' +
                                '<td>' +data['defectCount'][i].defect_count/totalDefect *100+'%</td></tr>'
                    });
                    $('#stat_tbl_developer').append(trHtml);
                }

                // data - contain json response from the routes.php
                // create the Dynamic QA Engineer Table

                function createQATable(data){
                    var trHtml1 = '';
                    $('#stat_tbl_QA').text('');
                    var head1 = '<thead><tr><td>QA Engineer</td></tr></thead>';
                    $('#stat_tbl_QA').append(head1);

                    $.each(data['qaTeam'], function (j, dataSet1) {
                        trHtml1 +='<tr><td>'+data['qaTeam'][j].first_name+'</td></tr>'
                    });
                    $('#stat_tbl_QA').append(trHtml1);
                }

                /*
                * data - contain json response from the routes.php
                * get the total number of defect
                *
                * return int - number of defects for a particular user.
                * */
                function getTotalDefects(data){
                    var totalDefect = 0;
                    $.each(data['developers'], function (i, dataSet) {
                        totalDefect += parseFloat(data['defectCount'][i].defect_count);
                    });
                    return totalDefect;
                }

                function getColor(total, value){
                    var percentage = (value /total) * 100;

                    if(percentage>75){
                        return "danger";
                    }else if(percentage>50){
                        return "warning";
                    }else if(percentage>20){
                        return "active";
                    }else if(percentage>=0){
                        return "success"
                    }
                }
            </script>
        </div>
        <!-- End Project Stats -->
        <!-- End Second Row -->

    </div>

    <!-- Start Third Row -->
    <div class="row">

        <!-- Start General Stats -->
        <div class="col-md-12 col-lg-6" style="width:100%">
            <div class="panel panel-widget">
                <div class="panel-title">
                    Project Progress
                </div>
                <div class="panel-body">

                    @foreach($projects as $project)
                        <?php
                        $progress = ($project->no_of_compl_user_stories / $project->no_of_user_stories * 100);
                        $progress = round($progress);
                        ?>
                        <div class="easypie margin-b-50" data-percent="{{ $progress}}">
                            <span>{{$progress}}%</span>{{ $project->project_name }}</div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- End General Stats -->
    </div>
    <!-- End Third Row -->


    <!-- Start Second Row -->

    <div class="row">

        <!-- Start Panel -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    All Raised Defects by me
                </div>
                <div class="panel-body table-responsive">

                    <table id="example" class="table display">
                        <thead>
                        <tr>
                            <th>Defect ID</th>
                            <th>Title</th>
                            <th>Project</th>
                            <th>Description</th>
                            <th>Raised for</th>
                            <th>Raised Date & Time</th>

                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Defect ID</th>
                            <th>Title</th>
                            <th>Project</th>
                            <th>Description</th>
                            <th>Raised for</th>
                            <th>Raised Date & Time</th>

                        </tr>
                        </tfoot>

                        <tbody>
                        <!-- Data to be display in the data table here-->
                        @foreach($defects as $defect)
                            <tr>
                                <td>{{ $defect->defect_id }}</td>
                                <td>{{ $defect->title }}</td>
                                <td>{{ $defect->project_name}}</td>
                                <td>{{ $defect->description }}</td>
                                <td>{{ $defect->first_name}}</td>
                                <td>{{ $defect-> raised_date . " @ " .$defect->raised_time}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- End Panel -->

    </div>


    <!-- End Second Row -->


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


<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->


<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/plugins.js')}}"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/bootstrap-select/bootstrap-select.js')}}"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="{{URL::asset('js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js')}}"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="{{URL::asset('js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/summernote/summernote.min.js')}}"></script>

<!-- ================================================
Flot Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="{{URL::asset('js/flot-chart/flot-chart.js')}}"></script>
<!-- time.js -->
<script type="text/javascript" src="{{URL::asset('js/flot-chart/flot-chart-time.js')}}"></script>
<!-- stack.js -->
<script type="text/javascript" src="{{URL::asset('js/flot-chart/flot-chart-stack.js')}}"></script>
<!-- pie.js -->
<script type="text/javascript" src="{{URL::asset('js/flot-chart/flot-chart-pie.js')}}"></script>
<!-- demo codes -->
<script type="text/javascript" src="{{URL::asset('js/flot-chart/flot-chart-plugin.js')}}"></script>

<!-- ================================================
Chartist
================================================ -->
<!-- main file -->
<script type="text/javascript" src="{{URL::asset('js/chartist/chartist.js')}}"></script>
<!-- demo codes -->
<script type="text/javascript" src="{{URL::asset('js/chartist/chartist-plugin.js')}}"></script>

<!-- ================================================
Easy Pie Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="{{URL::asset('js/easypiechart/easypiechart.js')}}"></script>
<!-- demo codes -->
<script type="text/javascript" src="{{URL::asset('js/easypiechart/easypiechart-plugin.js')}}"></script>

<!-- ================================================
Sparkline
================================================ -->
<!-- main file -->
<script type="text/javascript" src="{{URL::asset('js/sparkline/sparkline.js')}}"></script>
<!-- demo codes -->
<script type="text/javascript" src="{{URL::asset('js/sparkline/sparkline-plugin.js')}}"></script>

<!-- ================================================
Rickshaw
================================================ -->
<!-- d3 -->
<script src="{{URL::asset('js/rickshaw/d3.v3.js')}}"></script>
<!-- main file -->
<script src="{{URL::asset('js/rickshaw/rickshaw.js')}}"></script>
<!-- demo codes -->
<script src="{{URL::asset('js/rickshaw/rickshaw-plugin.js')}}"></script>

<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="{{URL::asset('js/bootstrap/bootstrap.min.js')}}"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->


<!-- ================================================
<!-- ================================================
Data Tables
================================================ -->
<script src="{{URL::asset('js/datatables/datatables.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('#example0').DataTable();
    });
</script>


<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            "columnDefs": [
                {"visible": false, "targets": 2}
            ],
            "order": [[2, 'asc']],
            "displayLength": 25,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({page: 'current'}).nodes();
                var last = null;

                api.column(2, {page: 'current'}).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            }
        });

        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            }
            else {
                table.order([2, 'asc']).draw();
            }
        });

    });

</script>

<!--#shaTagBelow-->
<!-- ===================  this script is for changing Dev Combo Box accoding to project Selection -->

<!-- =========================================================================================-->

<!-- ================================================
Sweet Alert
================================================ -->
<script src="{{URL::asset('js/sweet-alert/sweet-alert.min.js')}}"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="{{URL::asset('js/kode-alert/main.js')}}"></script>

<!-- ================================================
<!-- main file -->
<script src="{{URL::asset('js/gmaps/gmaps.js')}}"></script>
<!-- demo codes -->
<script src="{{URL::asset('js/gmaps/gmaps-plugin.js')}}"></script>

<!-- ================================================
jQuery UI
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/moment/moment.min.js')}}"></script>

<!-- ================================================
Full Calendar
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/full-calendar/fullcalendar.js')}}"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="{{URL::asset('js/date-range-picker/daterangepicker.js')}}"></script>

<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->
<script>

    // set up our data series with 50 random data points

    var seriesData = [[], [], []];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 110; i++) {
        random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph({
        element: document.getElementById("todaysales"),
        renderer: 'bar',
        series: [
            {
                color: "#33577B",
                data: seriesData[0],
                name: 'Photodune'
            }, {
                color: "#77BBFF",
                data: seriesData[1],
                name: 'Themeforest'
            }, {
                color: "#C1E0FF",
                data: seriesData[2],
                name: 'Codecanyon'
            }
        ]
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph,
        formatter: function (series, x, y) {
            var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
            var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
            var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
            return content;
        }
    });

</script>

<!-- Today Activity -->
<script>
    // set up our data series with 50 random data points

    var seriesData = [[], [], []];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph({
        element: document.getElementById("todayactivity"),
        renderer: 'area',
        series: [
            {
                color: "#9A80B9",
                data: seriesData[0],
                name: 'London'
            }, {
                color: "#CDC0DC",
                data: seriesData[1],
                name: 'Tokyo'
            }
        ]
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph,
        formatter: function (series, x, y) {
            var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
            var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
            var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
            return content;
        }
    });
</script>

</body>
</html>