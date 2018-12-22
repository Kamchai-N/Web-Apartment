<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Add Admin</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register an Account</h3>
              </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email address (Username) </label>
                                    <input type="email" class="form-control" id="exampleInpuEmail" placeholder="Enter Email address">
                                </div>
                                <div class="form-group">
                                <label>Select Position</label>
                                    <select class="form-control select2" style="width: 100%;" id="exampleFormControlSelect">
                                        <option selected="selected">Manager</option>
                                        <option>Admin</option>
                                        <option>Web Master</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="input-group">
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>
        </section>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var name =  $("#exampleInputName").val();
            var email =  $("#exampleInpuEmail").val();
            var position = $('#exampleFormControlSelect option:selected').text();    
            var password = $("#inputPassword").val();
            var password_Confirm = $("#confirmPassword").val();
            var json = {"name":name,"email":email,"password":password,"password_Confirm":password_Confirm,"position":position};
            var Msg = null;
            check();
            if (Msg == null) {
                if (password == password_Confirm) {
                    $.ajax({
                        type: "post",
                        url: "Server/AddAdmin.php",
                        data: json,
                        success: function (response) {
                        if(response){
                            swal("สร้างบัญชีสำเร็จ", "Username : " + email + "\n" + "Password : " + password, "success");
                        }else{
                            swal("สร้างบัญชีไม่สำเร็จ", "", "error");
                        }
                        }
                    }); 
                }else{
                    swal("Error !!!", "Password กับ Confirm Password ไม่ตรงกัน", "error");
                }
            }else{
                swal("Error !!!", "กรุณาใส่ให้ครบทุกช่อง", "error");                
            }
            function check() {
                if (name != '') { }else{ Msg = "Name ,"; }
                if (email != '') { }else{Msg += "Email ,"; }
                if (password != '') { }else{Msg += "Password ,"; }
                if (password_Confirm != '') { }else{Msg += "Confirm Password"; }
            }
        });
    });
</script>
</body>
</html>