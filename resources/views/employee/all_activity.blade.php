@extends('employee.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Activities</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Activity Name</th>
                        <th>Activity Description</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Edit Activity</th>
                        <th>Delete Activity</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        
                            <tr>
                                <th> Meeting </th>
                                <td> I was attending meeting at hall </td>
                                <td> 6:50 am </td>
                                <td> 1:00 pm </td>
                                <td> <a href="#"><button class="btn btn-primary">Edit</button></a> </td>
                                <td> <a href=""><button class="btn btn-danger">Remove</button></a> </td>
                            </tr>
                           
                            <tr>
                                <th> Gardening </th>
                                <td> I was at the ground </td>
                                <td> 8:50 am </td>
                                <td> 3:00 pm </td>
                                <td> <a href="#"><button class="btn btn-primary">Edit</button></a> </td>
                                <td> <a href=""><button class="btn btn-danger">Remove</button></a> </td>
                            </tr>

                            <tr>
                                <th> Bathroom cleaning</th>
                                <td> I was cleaning top floor washrooms </td>
                                <td> 2:50 pm </td>
                                <td> 5:00 pm </td>
                                <td> <a href="#"><button class="btn btn-primary">Edit</button></a> </td>
                                <td> <a href=""><button class="btn btn-danger">Remove</button></a> </td>
                            </tr>
                        
                
    
                    </tbody>
                </table>
    
            
            </div>
        </div>
@endsection