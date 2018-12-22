<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>APARTMENT</b> - A</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><span class="fa fa-envelope"></span></div>
          </div>
          <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
        </div>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><span class="fa fa-lock ml-1 mr-1" ></span></div>
          </div>
          <input type="password" class="form-control" id="inlineFormInputGroupPassword" placeholder="Password">
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="btn-signin">Sign In</button>
          </div>
        </div>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    });
    $("#btn-signin").click(function (e) { 
      var Msg = null;      
      var username =  $("#inlineFormInputGroupUsername").val();
      var password =  $("#inlineFormInputGroupPassword").val(); 
      var dataJson = {'email':username,'password':password};
      check();
      if (Msg == null) {
          $.ajax({
            type: "post",
            url: "./Server/LoginAdmin.php",
            data: dataJson,
            success: function (response) {
              if(response == 'OK'){
                window.location.href="./index.php";
              }else{
                swal("เข้าสู่ระบบไม่สำเร็จ", "กรุณากรอก Username และ Password", "error"); 
              }
            }
          });
      }else{
          swal("Error !!!", "กรุณาใส่ให้ครบทุกช่อง", "error");                
      }
      function check() {
        if (username != '') { }else{ Msg = "Username"; }
        if (password != '') { }else{Msg += "Password"; }
      }
    });
  })
</script>
</body>
</html>
