<!DOCTYPE html>
<html>
<head>
    <style>
        .page-footer{
            background: rgb(70, 70, 70);
        }
        .footer-copyright{
            background: rgb(54, 54, 54);
        }
        
    </style>
</head>
<body>
    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">
    <div class="container text-center text-md-left  ">
      <div class="row">
        <div class="col-md-6 col-sm-6 mt-md-0 mt-3">
          <h5 class="text-uppercase text-white">Footer Content</h5>
          <p class="text-white">Here you can use rows and columns here to organize your footer content.</p>

        </div>
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-3 col-sm-3 mb-md-0 mb-3">
            <h5 class="text-uppercase text-white">Links</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>

          </div>
          <div class="col-md-3 col-sm-3 mb-md-0 mb-3">
            <h5 class="text-uppercase text-white">Other</h5>
            <ul class="list-unstyled">
              <li>
                <a href="
                <?php
                  if(isset($_SESSION['Adminname'])){
                    echo "./Admin/index.php";
                  }else{
                    echo "./Admin/login.php";
                  }

                ?>
                " class="text-white">Admin</a>
              </li>
            </ul>
          </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3 text-white">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" class="text-white"> MDBootstrap.com</a>
    </div>
  </footer>
</body>
</html>