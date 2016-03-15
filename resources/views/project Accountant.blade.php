<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Project Accountant</title>

  <!-- ========== Css Files ========== -->
  <link href="{{URL::asset('css/root.css')}}" rel="stylesheet">

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
  		<a href="/" class="logo">Accountant</a>
  	</div>
  	<!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->
    <form class="searchform">
      <input type="text" class="searchbox" id="searchbox" placeholder="Search">
      <span class="searchbutton"><i class="fa fa-search"></i></span>
    </form>
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
  <li><a href="developer.blade"><span class="icon color5"><i class="fa fa-legal"></i></span>Developer<span class="label label-default"></span></a></li>
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





 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Tab Panel -->
    <div class="col-md-12 col-lg-4 padding-0" style="width: 100%;;">
      <div class="panel panel-transparent">


        <div class="panel-body">

          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabcolor6-bg" role="tablist">
              <li role="presentation" class="active"><a href="#home11" aria-controls="home11" role="tab" data-toggle="tab">Create New Project</a></li>
              <li role="presentation"><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">Update Project</a></li>
              
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home11">


                <!-- Start  inner Tab Panel -->

                  <div class="panel panel-transparent" style="width: 100%">
                    <div class="panel-body">
                      <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-line" role="tablist">
                          <li role="presentation" class="active"><a href="#home5" aria-controls="home5" role="tab" data-toggle="tab">Project Basic Details</a></li>
                          <li role="presentation"><a href="#profile5" aria-controls="profile5" role="tab" data-toggle="tab">Assign Responsibles</a></li>
                          <li role="presentation"><a href="#messages5" aria-controls="messages5" role="tab" data-toggle="tab">Assign Developer Team</a></li>
                          <li role="presentation"><a href="#messages6" aria-controls="messages5" role="tab" data-toggle="tab">Assign QA Team</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="home5">
                            

                            <div class="col-md-12 col-lg-6" style="width: 100%;">
                              <div class="panel panel-default">


                                <div class="panel-body">
                                  <form class="form-horizontal">

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label form-label">Project Name</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input11">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label form-label">Description</label>
                                      <div class="col-sm-10">
                                        <textarea class="form-control" rows="3"></textarea>
                                      </div>
                                    </div>


                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Next</button>
                                      </div>
                                    </div>

                                  </form>

                                </div>

                              </div>
                            </div>




                            <!--- End project basic form-->
                          </div>
                          <div role="tabpanel" class="tab-pane" id="profile5">
                            <!--Start inner tab-->
                            <div class="col-md-12 col-lg-6" style="width: 100%;">
                              <div class="panel panel-default">


                                <div class="panel-body">
                                  <form class="form-horizontal">

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label form-label">Project Manager Name</label>
                                      <div class="col-sm-10">
                                        <select class="selectpicker" style="width: 50%">
                                          <option>Themeforest</option>
                                          <option>Codecanyon</option>
                                          <option>Photodune</option>
                                          <option>Graphicriver</option>
                                          <option>Activeden</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label form-label">Consultant Architecture</label>
                                      <div class="col-sm-10">
                                        <select class="selectpicker" style="width: 50%">
                                          <option>Themeforest</option>
                                          <option>Codecanyon</option>
                                          <option>Photodune</option>
                                          <option>Graphicriver</option>
                                          <option>Activeden</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label form-label">QA Lead</label>
                                      <div class="col-sm-10">
                                        <select class="selectpicker" style="width: 50%">
                                          <option>Themeforest</option>
                                          <option>Codecanyon</option>
                                          <option>Photodune</option>
                                          <option>Graphicriver</option>
                                          <option>Activeden</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Next</button>
                                      </div>
                                    </div>

                                  </form>

                                </div>

                              </div>
                            </div>
                            <!--End inner tab-->
                          </div>
                          <div role="tabpanel" class="tab-pane" id="messages5">
                            <!--Start Dev-->
                            <div class="col-md-6 col-lg-4" style="width: 100%">
                              <div class="panel panel-default">

                                <div class="panel-title">
                                  Select Developers
                                </div>
                                <div class="panel-body">
                                  <form class="form-horizontal">
                                  <div class="panel panel-default">

                                    <div class="checkbox checkbox-primary">
                                      <input id="checkbox101" type="checkbox">
                                      <label for="checkbox101">
                                        Default
                                      </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                      <input id="checkbox102" type="checkbox" checked>
                                      <label for="checkbox102">
                                        Primary
                                      </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                      <input id="checkbox103" type="checkbox">
                                      <label for="checkbox103">
                                        Success
                                      </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                      <input id="checkbox104" type="checkbox">
                                      <label for="checkbox104">
                                        Info
                                      </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                      <input id="checkbox105" type="checkbox" checked>
                                      <label for="checkbox105">
                                        Warning
                                      </label>
                                    </div>

                                    <div class="form-group">
                                      <div class="top-right">
                                        <button type="submit" class="btn btn-default">Next</button>
                                      </div>
                                    </div>



                                  </div>
                                    </form>
                                </div>

                              </div>

                            </div>

                            <!--End DEV-->
                          </div>
                          <div role="tabpanel" class="tab-pane" id="messages6">
                            <!--Start QA-->
                            <div class="col-md-6 col-lg-4" style="width: 100%">
                              <div class="panel panel-default">

                                <div class="panel-title">
                                  Select QA
                                </div>
                                <div class="panel-body">
                                  <form class="form-horizontal">


                                    <div class="panel panel-default">

                                      <div class="checkbox checkbox-warning">
                                        <input id="checkbox1011" type="checkbox">
                                        <label for="checkbox1011">
                                          Default
                                        </label>
                                      </div>
                                      <div class="checkbox checkbox-warning">
                                        <input id="checkbox1022" type="checkbox" checked>
                                        <label for="checkbox1022">
                                          Primary
                                        </label>
                                      </div>
                                      <div class="checkbox checkbox-warning">
                                        <input id="checkbox1033" type="checkbox">
                                        <label for="checkbox1033">
                                          Success
                                        </label>
                                      </div>
                                      <div class="checkbox checkbox-warning">
                                        <input id="checkbox1044" type="checkbox">
                                        <label for="checkbox1044">
                                          Info
                                        </label>
                                      </div>
                                      <div class="checkbox checkbox-warning">
                                        <input id="checkbox1055" type="checkbox" checked>
                                        <label for="checkbox1055">
                                          Warning
                                        </label>
                                      </div>
                                      <div class="form-group">
                                        <div class="top-right">
                                          <button type="submit" class="btn btn-default">Finish</button>
                                        </div>
                                      </div>




                                    </div>




                                    </form>
                                </div>

                              </div>

                            </div>

                            <!--End QA-->
                          </div>
                        </div>

                      </div>

                    </div>

                  </div>

                <!-- End inner Tab Panel -->


              </div>
              <div role="tabpanel" class="tab-pane" id="profile11">

                <!--Start inner update-->
                  <div class="panel panel-transparent" style="width: 100%">


                    <div class="panel-body">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label class="col-sm-2 control-label form-label">Project Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="input111">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label form-label">Developers</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label form-label">QA Team</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label form-label">Project Manager </label>
                          <div class="col-sm-10">
                            <select class="selectpicker" style="width: 50%">
                              <option>Themeforest</option>
                              <option>Codecanyon</option>
                              <option>Photodune</option>
                              <option>Graphicriver</option>
                              <option>Activeden</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label form-label">Consultant Architecture</label>
                          <div class="col-sm-10">
                            <select class="selectpicker" style="width: 50%">
                              <option>Themeforest</option>
                              <option>Codecanyon</option>
                              <option>Photodune</option>
                              <option>Graphicriver</option>
                              <option>Activeden</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label form-label">QA Lead</label>
                          <div class="col-sm-10">
                            <select class="selectpicker" style="width: 50%">
                              <option>Themeforest</option>
                              <option>Codecanyon</option>
                              <option>Photodune</option>
                              <option>Graphicriver</option>
                              <option>Activeden</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                          </div>
                        </div>
                      </form>

                    </div>

                  </div>

                <!--End Inner Update-->
              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
    <!-- End Tab Panel -->
  </div>
  <!-- End Row -->









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
<!-- START SIDEPANEL -->
<div role="tabpanel" class="sidepanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#today" aria-controls="today" role="tab" data-toggle="tab">TODAY</a></li>
    <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">TASKS</a></li>
    <li role="presentation"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">CHAT</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- Start Today -->
    <div role="tabpanel" class="tab-pane active" id="today">

      <div class="sidepanel-m-title">
        Today
        <span class="left-icon"><a href="#"><i class="fa fa-refresh"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-file-o"></i></a></span>
      </div>

      <div class="gn-title">NEW</div>

      <ul class="list-w-title">
        <li>
          <a href="#">
            <span class="label label-danger">ORDER</span>
            <span class="date">9 hours ago</span>
            <h4>New Jacket 2.0</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-success">COMMENT</span>
            <span class="date">14 hours ago</span>
            <h4>Bill Jackson</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-info">MEETING</span>
            <span class="date">at 2:30 PM</span>
            <h4>Developer Team</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-warning">EVENT</span>
            <span class="date">3 days left</span>
            <h4>Birthday Party</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
      </ul>

    </div>
    <!-- End Today -->

    <!-- Start Tasks -->
    <div role="tabpanel" class="tab-pane" id="tasks">

      <div class="sidepanel-m-title">
        To-do List
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>

      <div class="gn-title">TODAY</div>

      <ul class="todo-list">
        <li class="checkbox checkbox-primary">
          <input id="checkboxside1" type="checkbox"><label for="checkboxside1">Add new products</label>
        </li>
        
        <li class="checkbox checkbox-primary">
          <input id="checkboxside2" type="checkbox"><label for="checkboxside2"><b>May 12, 6:30 pm</b> Meeting with Team</label>
        </li>
        
        <li class="checkbox checkbox-warning">
          <input id="checkboxside3" type="checkbox"><label for="checkboxside3">Design Facebook page</label>
        </li>
        
        <li class="checkbox checkbox-info">
          <input id="checkboxside4" type="checkbox"><label for="checkboxside4">Send Invoice to customers</label>
        </li>
        
        <li class="checkbox checkbox-danger">
          <input id="checkboxside5" type="checkbox"><label for="checkboxside5">Meeting with developer team</label>
        </li>
      </ul>

      <div class="gn-title">TOMORROW</div>
      <ul class="todo-list">
        <li class="checkbox checkbox-warning">
          <input id="checkboxside6" type="checkbox"><label for="checkboxside6">Redesign our company blog</label>
        </li>
        
        <li class="checkbox checkbox-success">
          <input id="checkboxside7" type="checkbox"><label for="checkboxside7">Finish client work</label>
        </li>
        
        <li class="checkbox checkbox-info">
          <input id="checkboxside8" type="checkbox"><label for="checkboxside8">Call Johnny from Developer Team</label>
        </li>

      </ul>
    </div>    
    <!-- End Tasks -->

    <!-- Start Chat -->
    <div role="tabpanel" class="tab-pane" id="chat">

      <div class="sidepanel-m-title">
        Friend List
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>

      <div class="gn-title">ONLINE MEMBERS (3)</div>
      <ul class="group">
        <li class="member"><a href="#"><img src="img/profileimg.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status online"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg2.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status busy"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg3.png" alt="img"><b>Fred Stonefield</b>New York</a><span class="status away"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg4.png" alt="img"><b>Chris M. Johnson</b>California</a><span class="status online"></span></li>
      </ul>

      <div class="gn-title">OFFLINE MEMBERS (8)</div>
     <ul class="group">
        <li class="member"><a href="#"><img src="img/profileimg5.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status offline"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg6.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status offline"></span></li>
      </ul>

      <form class="search">
        <input type="text" class="form-control" placeholder="Search a Friend...">
      </form>
    </div>
    <!-- End Chat -->

  </div>

</div>
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 



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

</body>
</html>