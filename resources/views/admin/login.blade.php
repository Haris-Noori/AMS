@extends('shared.login')

@section('pageContent')

<h2 class="h4 text-gray-900 mb-4">Admin Login</h2>
</div>
<form class="user" action="" method="">
    <div class="form-group">
        <input name="admin_name" type="text" class="form-control form-control-user" id="exampleInputEmail"
            aria-describedby="emailHelp" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
        <input name="admin_pass" type="password" class="form-control form-control-user"
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
    <a href="{{ url('/admin/dash') }}"><button class="btn btn-primary btn-user btn-block" type="submit">Login</button></a>
</form>
<hr>
<a href="{{ url('/faculty') }}" class="btn btn-outline-success btn-user btn-block">Login as
    Faculty</a>
<a href="{{ url('/login') }}" class="btn btn-outline-success btn-user btn-block">Login as Student</a>

<hr>
<div class="text-center">
    <a class="small" href="forgot-password.html">Forgot Password?</a>
</div>

@endsection