<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>QA Dashboard for Agile</title>

  <!-- ========== Css Files ========== -->
  <link href="{{URL::asset('css/root.css')}}" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>
    <div class="login-form">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="top">
          <img src="{{URL::asset('img/kode-icon.png')}}" alt="icon" class="icon">
          <h2>QA Dashboard</h2>
          <h4>-Alpha Team-</h4>
        </div>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong></strong>Login Failed!!<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="form-area">
          <div class="group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <i class="fa fa-key"></i>
          </div>
          <div class="form-group">
            <div class="checkbox checkbox-primary">
              <input id="checkbox101" type="checkbox" checked="">
              <label for="checkbox101"> Remember Me</label>
            </div>
            </div>

          <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="#"> </a></div>
        <div class="col-xs-6 text-right"><a href="#"><i class="fa fa-lock"></i> Forgot password</a></div>
      </div>
    </div>

</body>
</html>