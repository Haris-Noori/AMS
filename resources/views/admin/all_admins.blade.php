@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Admins / {{ $viewTitle }} </h1>
            <a href="{{ url('/admin/add_admin') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Admin</a>
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Admin ID</th>
                        <th class="text-center col-2">Photo</th>
                        <th>Admin Name</th>
                        <th>Admin Type</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($admins as $admin)
                        {
                            ?>
                            <tr>
                                <th> {{$admin->id}} </th>
                                <td class="text-center">
                                    <img src="{{ asset('uploads/'.$admin->image_path) }}" width="200" alt="">
                                </td>
                                <td> {{$admin->admin_name}} </td>
                                <td> {{$admin->type}} </td>
                                <td> <a href="#"><button class="btn btn-success">Reset Password</button></a> </td>
                                <td> <a href="#"><button class="btn btn-primary">Edit Details</button></a> </td>
                                <td> <a href="{{ url('/admin/removeAdmin/'.$admin->id) }}"><button class="btn btn-danger">Remove</button></a> </td>
                            </tr>
                            <?php   
                        }
                    ?>
    
                    </tbody>
                </table>
    
                <!--MODAL-->
                {{-- <?php
                    if(isset($_GET["Message"]))
                    {
                      echo '<script>alert("'.$_GET[Message].'")</script>';
                    }
                ?> --}}
            </div>
        </div>
@endsection