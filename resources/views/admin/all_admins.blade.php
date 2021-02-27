@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> {{ $viewTitle }} </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Admin ID</th>
                        <th>Admin Name</th>
                        <th>Admin Type</th>
                        <th>Reset Password</th>
                        <th>Edit Details</th>
                        <th>Remove Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($admins as $admin)
                        {
                            ?>
                            <tr>
                                <th> {{$admin->id}} </th>
                                <td> {{$admin->admin_name}} </td>
                                <td> {{$admin->type}} </td>
                                <td> <a href="#"><button class="btn btn-success">Reset</button></a> </td>
                                <td> <a href="#"><button class="btn btn-primary">Edit</button></a> </td>
                                <td> <a href="#"><button class="btn btn-danger">Remove</button></a> </td>
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