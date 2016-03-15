<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
        <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
        <title>Developer</title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- ========== Css Files ========== -->
        <link href="{{URL::asset('css/root.css')}}" rel="stylesheet">

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



    <div class="container" style="width: 100%; ">

        @yield('content')


    </div>

    {{--This is for defect--}}
    <div class="modal fade" id="myModalDefect" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Defect Details</h4>
                </div>
                <div class="modal-body">

                    <div class="panel panel-default">
                        {{--<div class="panel-title">Defect Details</div>--}}
                            <div class="panel-body table-responsive">

                               <label class="col-sm-5  control-label form-label">Defect ID</label>
                               <div class="col-sm-6">
                                   <p id="defectID" class="form-control-static">...</p>
                               </div>

                               <label class="col-sm-5  control-label form-label">Project Name</label>
                               <div class="col-sm-6">
                                   <p id="prjName" class="form-control-static">...</p>
                               </div>

                               <label class="col-sm-5  control-label form-label">Qa Engineer</label>
                               <div class="col-sm-6">
                                   <p id="qaEng" class="form-control-static">...</p>
                               </div>

                               <label class="col-sm-5  control-label form-label">Title</label>
                               <div class="col-sm-6">
                                   <p id="title" class="form-control-static">...</p>
                               </div>

                                <label class="col-sm-5  control-label form-label">Description</label>
                                <div class="col-sm-6">
                                    <p id="descript" class="form-control-static">...</p>
                                </div>

                                <label class="col-sm-5  control-label form-label">Attachment URL</label>
                                <div class="col-sm-6">
                                    <a href="#"><p id="attachment" class="form-control-static">...</p></a>
                                </div>

                            </div>
                    </div>

                </div>
                {!! Form::open(['url'=>'developer']) !!}
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-dismiss="modal" data-toggle="modal"
                            data-target="#responseSubmit" id="response">Fix</button>
                    <button type="submit" class="btn btn-default" data-dismiss="modal" data-toggle="modal"
                            data-target="#responseSubmit" id="response">Response</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

{{--this is for button click--}}
    <div class="modal fade" id="responseSubmit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Defects Response</h4>
                </div>
                <div class="modal-body">

                    <b>Defect Response has been send</b>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
     </div>
    {{-- ************* End of popup message ******************** --}}


    <div class="modal fade" id="myModalProject" role="dialog">
        <div class="modal-dialog modal-lg">
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
                                                                           role="tab" data-toggle="tab">Poject Management</a></li>
                                                <li role="presentation"><a href="#messages5" aria-controls="messages5"
                                                                           role="tab" data-toggle="tab">Developers</a></li>
                                                <li role="presentation"><a href="#messages6" aria-controls="messages6"
                                                                           role="tab" data-toggle="tab">QA Team</a></li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="home5">

                                                    {!! Form::open() !!}

                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Project ID :</td>
                                                            <td id="projectID"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Project Name :</td>
                                                            <td id="projectName"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No Of User Stroies :</td>
                                                            <td id="noOfUserStories"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No Of Complete User Stroies :</td>
                                                            <td id="noOfCompUserStories"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Description :</td>
                                                            <td id="descrip"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Start Date :</td>
                                                            <td id="startDate"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Due Date :</td>
                                                            <td id="endDate"></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>

                                                    {!! Form::close() !!}

                                                </div>

                                                <div role="tabpanel" class="tab-pane" id="profile5">

                                                    {!! Form::open() !!}
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Project Name :</td>
                                                            <td id="projectManageName"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Project Manager :</td>
                                                            <td id="projectManager"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Consultant Architechture :</td>
                                                            <td id="consultantArchitechture"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Project Accountant :</td>
                                                            <td id="projectAccountant"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    {!! Form::close() !!}
                                                </div>

                                                <div role="tabpanel" class="tab-pane" id="messages5">
                                                    <!-- Start Panel -->
                                                    <table  id="popUpDevelopmentTeam" class="table table-hover">

                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <!-- End Panel -->

                                                </div>

                                                <div role="tabpanel" class="tab-pane" id="messages6">
                                                    <!-- Start Panel -->

                                                        <table  id="popUpQATeam" class="table">

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
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span
                                    class="glyphicon glyphicon-cancel"></span> close
                        </button>

                    </div>
                </form>
            </div>

        </div>

        <script>
            $(document).ready(function(){
                $('#response').click(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: "developer",
                        type: "post"
                    });
                });
            });
        </script>
    </div>

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
    Data Tables
    ================================================ -->
    <script src="{{URL::asset('js/datatables/datatables.min.js')}}"></script>


    <script>
        $(document).ready(function() {
            $('#example0').DataTable();
        } );
    </script>



    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [
                    { "visible": false, "targets": 2 }
                ],
                "order": [[ 2, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;

                    api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                    '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                            );

                            last = group;
                        }
                    } );
                }
            } );

            // Order by the grouping
            $('#example tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
                    table.order( [ 2, 'desc' ] ).draw();
                }
                else {
                    table.order( [ 2, 'asc' ] ).draw();
                }
            } );
        } );
    </script>



    <!-- ================================================
    Sweet Alert
    ================================================ -->
    <script src="{{URL::asset('')}}js/sweet-alert/sweet-alert.min.js"></script>

    <!-- ================================================
    Kode Alert
    ================================================ -->
    <script src="{{URL::asset('')}}js/kode-alert/main.js"></script>

    <!-- ================================================
    Gmaps
    ================================================ -->
    <!-- google maps api -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <!-- main file -->
    <script src="js/gmaps/gmaps.js"></script>
    <!-- demo codes -->
    <script src="js/gmaps/gmaps-plugin.js"></script>

    <!-- ================================================
    jQuery UI
    ================================================ -->
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>

    <!-- ================================================
    Moment.js
    ================================================ -->
    <script type="text/javascript" src="js/moment/moment.min.js"></script>

    <!-- ================================================
    Full Calendar
    ================================================ -->
    <script type="text/javascript" src="js/full-calendar/fullcalendar.js"></script>

    <!-- ================================================
    Bootstrap Date Range Picker
    ================================================ -->
    <script type="text/javascript" src="js/date-range-picker/daterangepicker.js"></script>

    <!-- ================================================
    Below codes are only for index widgets
    ================================================ -->
    <!-- Today Sales -->
    <script>

        // set up our data series with 50 random data points

        var seriesData = [ [], [], [] ];
        var random = new Rickshaw.Fixtures.RandomData(20);

        for (var i = 0; i < 110; i++) {
            random.addData(seriesData);
        }

        // instantiate our graph!

        var graph = new Rickshaw.Graph( {
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
        } );

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail( {
            graph: graph,
            formatter: function(series, x, y) {
                var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
                var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
                var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
                return content;
            }
        } );

    </script>

    <!-- Today Activity -->
    <script>
        // set up our data series with 50 random data points

        var seriesData = [ [], [], [] ];
        var random = new Rickshaw.Fixtures.RandomData(20);

        for (var i = 0; i < 50; i++) {
            random.addData(seriesData);
        }

        // instantiate our graph!

        var graph = new Rickshaw.Graph( {
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
        } );

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail( {
            graph: graph,
            formatter: function(series, x, y) {
                var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
                var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
                var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
                return content;
            }
        } );
    </script>






    </body>
</html>