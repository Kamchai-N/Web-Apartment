<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apartpment - U | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Apartpment</b> - U</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><span class="fa fa-envelope"></span></div>
          </div>
          <input type="text" class="form-control" id="InputUsername" placeholder="Username">
        </div>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><span class="fa fa-lock ml-1 mr-1" ></span></div>
            </div>
            <input type="password" class="form-control" id="InputPassword" placeholder="Password">
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <!-- <label>
                <input type="checkbox"> Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="btnSignIn">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p> -->
      <p class="mb-0">
        <a href="./register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
<script>
  $(document).ready(function () {
    $("#btnSignIn").click(function () { 
      var Username = $("#InputUsername").val();
      var Password = $("#InputPassword").val();
      var json = {"Username":Username,"Password":Password};
      $.ajax({
        type: "post",
        url: "./Servers/SignIn.php",
        data: json,
        success: function (response) {
          if (response == "OK") {
            window.location.href = "./index.php";            
          }else{
            swal("สร้างบัญชีไม่สำเร็จ", "Username กับ Password อาจไม่ตรงกับที่ตั้ง", "error");            
          }
        }
      });
    });
  });
</script>
</body>
</html>
