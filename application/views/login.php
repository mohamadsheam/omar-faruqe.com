<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Omar Faruqe | login</title>
  <link rel="icon" href="<?php echo base_url() ?>assets/dist/img/favicon.png" type="image/png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" ng-app="login" ng-controller="loginValidationCtrl">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Omar</b>Faruqe</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        <div class="alert icon-alert with-arrow alert-danger" role="alert" ng-show="error">
          <i class="fa fa-fw fa-times-circle"></i>
          <strong> WARNING !</strong> {{message}}
        </div>

      <form method="post" ng-submit="loginFn()">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" ng-model="user.email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" ng-model="user.password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-large">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AngularJs -->
<script src="<?php echo base_url(); ?>assets/app/angular.min.js"></script>

<script>

  var app = angular.module("login",[]);
  var BASE_URL = '<?php echo base_url(); ?>';

  app.controller('loginValidationCtrl',["$scope", "$http", function($scope, $http){

    $scope.user = {};
    $scope.error = false;
    //console.log( BASE_URL + "api/Auth");

    $scope.loginFn = function(){
      //console.log($scope.user);

      $http({
          method : "POST",
          url : BASE_URL + "api/Auth",
          data : $scope.user
      }).then(function (response) {
          //console.log(response.data);
          if(response.data.status == 1){
            window.location = BASE_URL +'Dashboard';
          }else{
            $scope.error = true;
            $scope.message = response.data.msg;
          }

      },function (errors) {
          console.log(errors);
      });


    }


  }]);


</script>






</body>
</html>
