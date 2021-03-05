@extends('shared.login')

@section('pageContent')

<h2 class="h4 text-gray-900 mb-4">Admin Login</h2>
</div>
<form class="user" method="POST" action="{{ url('/admin/login') }}">
@csrf
    <div class="form-group">
        <input name="admin_name" type="text" class="form-control form-control-user" id="exampleInputEmail"
            aria-describedby="emailHelp" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
        <input name="admin_pass" type="password" class="form-control form-control-user" id="exampleInputPassword"
            placeholder="Password">
    </div>
    <div class="form-group">
        <?php
        
            if(isset($error))
            {   
                // echo $error;
                echo "<div class='col-sm-12 alert alert-danger'>";
                echo $error;
                echo "</div>";
            }
        ?>
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
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