@extends('shared.login')

@section('pageContent')

<h2 class="h4 text-gray-900 mb-4">Faculty Login</h2>
</div>
<form class="user" action="" method="POST">
    <div class="form-group">
        <input name="admin_name" type="text" required class="form-control form-control-user" id="exampleInputEmail"
            aria-describedby="emailHelp" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
        <input name="admin_pass" type="password" required class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Password">
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
<a href="index.html" class="btn btn-outline-success btn-user btn-block">Login as
    Student</a>
<a href="index.html" class="btn btn-outline-success btn-user btn-block">Login as
    Admin</a>

<hr>
<div class="text-center">
    <a class="small" href="forgot-password.html">Forgot Password?</a>
</div>

@endsection