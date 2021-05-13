@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> All Donation Boxes </h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Box Name</th>
                        <th>Reference Name</th>
                        <th>Collector</th>
                        <th>Frequency</th>
                        <th>Location</th>
                        <th>Address</th>
                        <th>City</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($donation_boxes as $donation_box)
                        {
                            ?>
                            <tr>
                                <td> {{ $donation_box->id }}</td>
                                <td> {{ $donation_box->box_name }}</td>
                                <td> {{ $donation_box->reference }} </td>
                                <td> {{ $donation_box->first_name }} {{ $donation_box->last_name }} </td>
                                <td> {{ $donation_box->frequency }} </td>
                                <td> {{ $donation_box->location_name }} </td>
                                <td> {{ $donation_box->address }} </td>
                                <td> {{ $donation_box->city }} </td>
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