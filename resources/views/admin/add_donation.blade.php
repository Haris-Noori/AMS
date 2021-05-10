@extends('admin.index')

@section('pageContent')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Donation</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-md-12">
        <h3>Admin Details</h3>

        <form action="{{ url('/addNewAdmin') }}" method="POST" class="col-md-10 mt-1">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12" >
                            <label for="exampleInputEmail1">Admin Name</label>
                            <input name="admin_name" type="text" required class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="admin_pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Set Admin Type</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                <option value="normal">None</option>
                                <option value="super">Super Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Upload Admin Image</label>
                    <br>
                    <img style="height: 200px; width: 250px" id='img-upload'/>
                    <div class="row">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                <span class="btn btn-primary">Choose Photo</span><input name="admin_image" type="file" id="imgInp">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly hidden>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button name="add-btn" type="submit" class="btn btn-success col-md-8">Add Admin</button>
            </div>
            <div class="form-group col-md-6 btn-outline-warning">
            
            </div>
        </form>
    </div>

    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        #img-upload{
            width: 100%;
        }
    </style>

@endsection