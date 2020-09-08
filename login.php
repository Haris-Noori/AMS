<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jamia Noorul Aloom Noori </title>

  <!-- Custom fonts for this template-->
  <link href="src/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="src/admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                      <h1 class="h3 text-warning col-md-12"><strong>JAMIA NOORUL ALOOM NOORI</strong></h1>
                    <h2 class="h4 text-gray-900 mb-4">Admin Login</h2>
                  </div>
                  <form class="user" action="src/admin/login_try.php" method="POST">
                    <div class="form-group">
                      <input name="admin_name" type="text" required class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                      <input name="admin_pass" type="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                       <?php
                           if(isset($_GET["Message"]))
                           {
                               echo "<div class='col-sm-12 alert alert-danger'>";
                               echo $_GET["Message"];
                               echo "</div>";
                           }
                       ?>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                  </form>
                    <hr>
                    <a href="index.html" class="btn btn-outline-success btn-user btn-block">Login as Employee</a>
                    <a href="index.html" class="btn btn-outline-success btn-user btn-block">Login as Student</a>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="src/admin/vendor/jquery/jquery.min.js"></script>
  <script src="src/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="src/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="src/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
