@extends('shared.login')

@section('pageContent')

<h2 class="h4 text-gray-900 mb-4">Employee Login</h2>
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
    <a href= "{{ url('/employee/index')}}"><button class="btn btn-primary btn-user btn-block" type="submit">Login</button></a>
</form>
<hr>
<a href="{{ url('/faculty/login') }}" class="btn btn-outline-success btn-user btn-block">Login as
    Faculty</a>
<a href="{{ url('/admin') }}" class="btn btn-outline-success btn-user btn-block">Login as Admin</a>

<hr>
<div class="text-center">
    <a class="small" href="forgot-password.html">Forgot Password?</a>
</div>

@endsection