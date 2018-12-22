<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">All Admin</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Times</th>
                      <th>Edit</th>
                  </tr>
                  <?php
                    include("../../../Servers/connect.php");
                    $sql = "SELECT * FROM `admin_list` ORDER BY `Id` DESC";
                    $query = mysqli_query($con,$sql);
                    while($d = mysqli_fetch_array($query)){
                      echo '<tr>';
                        echo '<th> '. $d[0] .'</th>';
                        echo '<th> '. $d[1] .'</th>';
                        echo '<th> '. $d[2] .'</th>';
                        echo '<th> '. $d[3] .'</th>';
                        echo '<th> '. $d[4] .'</th>';
                        echo '<th> '. $d[5] .'</th>';
                        echo '<th> '. $d[6] .'</th>';
                        echo '<th><button type="button" class="btn btn-success btn-sm">Edit</button></th>';
                      echo '</tr>';                      
                    }
                  ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
    </div>
</body>
</html>