@extends('shared.login')

@section('pageContent')

<h2 class="h4 text-gray-900 mb-4">Employee Login</h2>
</div>
<form class="user" action="{{ url('/employee/login') }}" method="POST">
    @csrf
    <div class="form-group">
        <input name="emp_name" type="text" required class="form-control form-control-user" id="exampleInputEmail"
            aria-describedby="emailHelp" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
        <input name="emp_pass" type="password" required class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Password">
    </div>
    <div class="form-group">
        @error('error')
            <div class='col-sm-12 alert alert-danger'>
                {{ $message }}
            </div>
        @enderror
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
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