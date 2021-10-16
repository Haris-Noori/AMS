@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Donations / All Donations</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">

                <span class="text-center">
                    <form action="{{ url('/admin/search-donations') }}" method="POST">
                        @csrf
                    <p>
                        Search by date <input type="date" required name="date" class="form-select">
                        <input type="submit" class="btn btn-primary btn-sm m-1" value="Search">
                    </p>
                    </form>
                </span>

                <h5>Total: Rs. {{ $sum }} </h5>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Donation Box Name</th>
                        <th>Amount Collected</th>
                        <th>Date(y-m-d) -Time</th>
                        <th>Added By</th>
                        <th>Photo</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($donations as $donation )
                            <tr>
                                <th> {{ $donation->id }} </th>
                                <td> {{ $donation->box_name }} </td>
                                <td> {{ $donation->amount_collected }} </td>
                                <td> {{ $donation->created_at }} </td>
                                <td> {{ $donation->first_name }} {{ $donation->last_name }} </td>
                                <td class="col-4"> 
                                    <img src="{{ asset('uploads/'.$donation->image_path) }}" class="col-12" alt="">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            
            </div>
        </div>
@endsection