@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> All Students </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Roll Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father Name</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Current Address</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($students as $student)
                        {
                            ?>
                            <tr>
                                <th> {{$student->id}} </th>
                                <td> {{$student->rollnumber}} </td>
                                <td> {{$student->first_name}} </td>
                                <td> {{$student->last_name}} </td>
                                <td> {{$student->email}} </td>
                                <td> {{$student->phone}} </td>
                                <td> {{$student->course_title}} </td>
                                <td> {{$student->current_address}} </td>
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