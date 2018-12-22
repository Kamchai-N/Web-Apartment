<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <style>
      body {
        padding-top: 54px;
        }

        @media (min-width: 992px) {
        body {
            padding-top: 56px;
        }
        }

  </style>
</head>
<body>
        <div class="container mt-2">

        <!-- Portfolio Item Heading -->
        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        <!-- Portfolio Item Row -->
        <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">Project Description</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
            <h3 class="my-3">Project Details</h3>
            <ul>
            <li>Lorem Ipsum</li>
            <li>Dolor Sit Amet</li>
            <li>Consectetur</li>
            <li>Adipiscing Elit</li>
            </ul>
            <a class="btn btn-success mt-2" id="btn-reser" href=" 
            <?php
                if(isset($_SESSION['Userid'])){
                    echo "Reservations/index.php";
                }else{
                    echo "Reservations/login.php";
                }
            ?>" >เข้าระบบจองห้องพัก</a>
        </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 class="my-4">Related Projects</h3>

        <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->
        <?php include("../Components/Footer.php") ?>

        <script>
            $(document).ready(function () {
                $("#btn-reser").click(function () { 
                    window.location.href = '../Reservations/index.php';
                });
            });
        </script>
</body>
</html>