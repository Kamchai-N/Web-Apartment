
<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php $dateTOday = date("Y-m-d"); $IDItem = 0?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ชำระเงิน</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-plus-square-o"></i> จองห้องพัก -->
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
          include("../../../Servers/connect.php");
          $sql = "SELECT * FROM `status_bookroom` WHERE `Status_Check` = 'กรุณาชำระเงิน' ORDER BY `ID` DESC";
          $query = mysqli_query($con,$sql);
          $num_rows = mysqli_num_rows($query);
          if($num_rows >= 1){
            echo "<tr>";
              echo "<th>ชื่อ</th>";
              echo "<th>Check In</th>";
              echo "<th>Check Out</th>";
              echo "<th>ห้องพัก</th>";
              echo "<th>ราคา</th>";
              echo "<th>Status</th>";
              echo "<th>ชำระเงิน</th>";
            echo "</tr>";
            while ($d = mysqli_fetch_array($query)){
              $idItemURL = urlencode($d[0]);
              $sqlIDUser = "SELECT `Name`  FROM `users_list` WHERE `id` = $d[10]";
              $queryIDUser = mysqli_query($con,$sqlIDUser);
              $IDUser = mysqli_fetch_array($queryIDUser);
              $idItemURL= $d[0];
              echo "<tr>";
                if($IDUser[0] == ""){
                  echo "<td> Admin </td>";
                }else{
                  echo "<td>".$IDUser[0]."</td>";
                }
                echo "<td>".$d[3]."</td>";
                echo "<td>".$d[4]."</td>";
                echo "<td>".$d[8]."</td>";
                echo "<td>".($d[9]*350)." บาท"."</td>";
                echo "<td>".$d[7]."</td>";
                if($d[7] == "ชำระเงินแล้ว"){
                  echo "<td>Check In</td>";
                }else{
                  echo "<td><a class='btn btn-success text-white' href='Server/Payment.php?idItemURL=$idItemURL'>ชำระเงิน</button></td>";
                }
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
    //   $('#btn-pay').click(function () { 
    //      var name = ;
    //      alert(name)
    //   });
    });
</script>
</body>
</html>