@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> All Donation Boxes </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Box Name</th>
                        <th>Reference Name</th>
                        <th>Collector</th>
                        <th>Frequency</th>
                        <th>Location</th>
                        <th>City</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                            <tr>
                                <th> Lahore1 </th>
                                <td> Haji Imran </td>
                                <td> Hafeez Noori </td>
                                <td> On wish </td>
                                <td> Noori Honda</td>
                                <td> Lahore </td>
                            </tr>

                            <tr>
                                <th> Lahore2 </th>
                                <td> Ali Raza </td>
                                <td> Hafeez Noori </td>
                                <td> 2 weeks </td>
                                <td> General Store </td>
                                <td> Lahore </td>
                            </tr>
                           
    
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