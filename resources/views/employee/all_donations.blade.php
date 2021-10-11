@extends('employee.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Donations</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Donation Box Name</th>
                        <th>Amount Collected</th>
                        <th>Date-Time</th>
                        <th class="text-center">Photo</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($donations as $donation )
                            <tr>
                                <th> {{ $donation->id }} </th>
                                <td> {{ $donation->box_name }} </td>
                                <td> {{ $donation->amount_collected }} </td>
                                <td> {{ $donation->created_at }} </td>
                                <td class="text-center col-4">
                                    <img src="{{ asset('uploads/'.$donation->image_path) }}" class="col-12" alt=""> 
                                    {{-- {{  }}  --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            
            </div>
        </div>
@endsection