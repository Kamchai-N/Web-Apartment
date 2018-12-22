
<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ห้องพัก</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-plus-square-o"></i> จองห้องพัก
              </button>
            </ol>
          </div>
        </div>
        <div class="modal fade" id="myModal">
          <div class="modal-dialog  modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">จองห้องพัก</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputState">จำนวนห้อง</label>
                        <select id="inputStateRoom" class="form-control">
                          <option selected>จำนวนห้อง</option>
                          <option>1</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputState">จำนวนเตียง</label>
                        <select id="inputStateCouch" class="form-control">
                          <option selected>จำนวนเตียง</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                        </select>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="bootstrap-iso">
                              <form method="post">
                                <div class="form-group"> <!-- Date input -->
                                  <label class="control-label" for="date">Check In</label>
                                  <input class="form-control datepicker" id="dateCheckIn" name="date" placeholder="MM/DD/YYY" type="text"/>
                                </div>
                              </form>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="bootstrap-iso">
                                <form method="post">
                                  <div class="form-group"> <!-- Date input -->
                                    <label class="control-label" for="date">Check Out</label>
                                    <input class="form-control datepicker" id="dateCheckOut" name="date" placeholder="MM/DD/YYY" type="text"/>
                                  </div>
                                </form>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputState">ผู้ใหญ่</label>
                          <select id="inputStateAdult" class="form-control">
                            <option selected>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputState">เด็ก</label>
                          <select id="inputStateChild" class="form-control">
                            <option selected>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="btnOK">จอง</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>
          <div>
          <table class="table">
    <thead>
    </thead>
    <tbody>
        <!-- <td><img class="img-fluid" src="http://placehold.it/200x50" alt=""></td> -->
        <?php
          include("../../Servers/connect.php");
          $id_users = $_SESSION['Userid'];
          $sql = "SELECT * FROM `status_bookroom` WHERE `ID_Users` = $id_users ORDER BY `ID` DESC";
          $query = mysqli_query($con,$sql);
          $num_rows = mysqli_num_rows($query);
          if($num_rows >= 1){
            echo "<tr>";
              echo "<th>เตียงนอน</th>";
              echo "<th>Check In</th>";
              echo "<th>Check Out</th>";
              echo "<th>ผู้ใหญ่</th>";
              echo "<th>เด็ก</th>";
              echo "<th>ห้องพัก</th>";
              echo "<th>ราคา</th>";
              echo "<th>Status</th>";
              echo "<th>Delete</th>";
            echo "</tr>";
            while ($d = mysqli_fetch_array($query)){
              $idItemURL = urlencode($d[0]);
              echo "<tr>";
                echo "<td>".$d[2]."</td>";
                echo "<td>".$d[3]."</td>";
                echo "<td>".$d[4]."</td>";
                echo "<td>".$d[5]."</td>";
                echo "<td>".$d[6]."</td>";
                echo "<td>".$d[8]."</td>";
                echo "<td>".($d[9]*350)." บาท"."</td>";
                echo "<td>".$d[7]."</td>";
                echo "<td><a class='btn btn-danger btn-sm text-white' href='Servers/DeleItem.php?idItemURL=$idItemURL'>Delete</button></td>";
              echo "</tr>";
            }
          }else{
            echo "ยังไม่มีการจองห้องพัก";
          }
        ?>
        <!-- <td>1</td>
        <td>0000-00-00</td>
        <td>0000-00-00</td>
        <td>1</td>
        <td>1</td>
        <td>101</td>
        <td>6000</td>
        <td>กรุณาชำระเงิน</td> -->
    </tbody>
  </table>
          </div>
          <!-- ยังไม่มีการจองห้องพัก -->
        </div>
      </div>
    </div>
<script>
    $(document).ready(function(){
      $('.datepicker').datepicker();
      $("#btnOK").click(function () { 
          var room = $("#inputStateRoom").val();
          var couch = $("#inputStateCouch").val();
          var dateCheckIn  = $("#dateCheckIn").val(); 
          var dateCheckOut  = $("#dateCheckOut").val(); 
          var adult  = $("#inputStateAdult").val();     
          var child  = $("#inputStateChild").val();
          var d = new Date(dateCheckIn);
          var json = {"room":room,"couch":couch,"dateCheckIn":dateCheckIn,"dateCheckOut":dateCheckOut,"adult":adult,"child":child}
          $.ajax({
            type: "post",
            url: "Servers/InertBookRoom.php",
            data: json,
            success: function (response) {
              if(response == "OK"){
                window.location.href = './index.php';
              }else{
                alert(response);
              }
            }
          });
      });
      // $(document).ready(function () {
      //   $("#btnDele").click(function (e) { 
      //     alert("KO");
      //   });
      // });
    })
</script>
</body>
</html>