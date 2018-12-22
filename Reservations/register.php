<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apartpment - U | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Apartpment</b> - U</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><span class="fa fa-user ml-1 mr-1" ></span></div>
            </div>
            <input type="text" class="form-control" id="InputName" placeholder="Full name">
          </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><span class="fa fa-envelope mr-1" ></span></div>
            </div>
            <input type="text" class="form-control" id="InputEmail" placeholder="Email">
          </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><span class="fa fa-lock ml-1 mr-1" ></span></div>
            </div>
            <input type="password" class="form-control" id="InputPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><span class="fa fa-lock ml-1 mr-1" ></span></div>
            </div>
            <input type="password" class="form-control" id="InputPasswordCon" placeholder="Confirm Password">
          </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><span class="fa fa-lock ml-1 mr-1" ></span></div>
            </div>
            <input type="text" class="form-control" id="InputPhone" placeholder="Phone Number">
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <!-- <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button class="btn btn-primary btn-block btn-flat" id="btn-Register">Register</button>
          </div>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
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
    $('#btn-Register').click(function (e) { 
      var name = $("#InputName").val();
      var email =  $("#InputEmail").val();
      var pass  = $("#InputPassword").val();
      var passCon = $("#InputPasswordCon").val();
      var phone = $("#InputPhone").val();
      var json = {"name":name,"email":email,"pass":pass,"passCon":passCon,"phone":phone};
      $.ajax({
        type: "post",
        url: "./Servers/Register.php",
        data: json,
        success: function (response) {
          if (response == "OK"){
              swal("สร้างบัญชีสำเร็จ", "", "success").then((willDelete) => {
                window.location.href = "./login.php";            
              });      
          } else if (response == "NOT"){
            swal("สร้างบัญชีไม่สำเร็จ", "", "error");            
          }else if (response == "Equal"){
            swal("Error !!!", "Password กับ Confirm Password ไม่ตรงกัน", "error");  
          } else if (response == "Email"){
            swal("Error !!!", "คุณได้ใช้อีเมลนี้ไปแล้ว", "error");  
          }
        }
      });
    });
  }); 
</script>
</body>
</html>
