@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees Activities</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
    
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Activity Name</th>
                        <th>Activity Description</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($activities as $activity )
                            <tr>
                                <th> {{ $activity->id }} </th>
                                <td> {{ $activity->first_name }} </td>
                                <td> {{ $activity->activity_name }} </td>
                                <td> {{ $activity->activity_description }} </td>
                                <td> {{ $activity->from }} </td>
                                <td> {{ $activity->to }} </td>
                                <td> {{ $activity->created_at }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            
            </div>
        </div>
@endsection