<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <style>
    .carousel-inner{
        width:100%;
        max-height: 500px !important;
    }
    </style>
</head>
<body>
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1460317442991-0ec209397118?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b95599cb95166892018645cd2a22923a&auto=format&fit=crop&w=800&h=400&q=80">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1496664444929-8c75efb9546f?ixlib=rb-0.3.5&s=6d9c690f637e6c5ca0cdaec52d6af17c&auto=format&fit=crop&w=800&h=400&q=80">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1493150134366-cacb0bdc03fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=d98494c50eba8a4b8ccb965288cfa490&auto=format&fit=crop&w=800&h=400&q=80">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
  <?php include("../Components/main/overview.html") ?>
  <?php include("../Components/Footer.php") ?>
</body>
</html>