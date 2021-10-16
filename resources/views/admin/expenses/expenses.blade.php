@extends('admin.index')

@section('pageContent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Expenses / All Expenses</h1>
            <a href="{{ url('/admin/add-expense') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> New Expense</a>
        </div>

        <div class="col-md-12">
            <span class="text-center">
                <form action="{{ url('/admin/search-expenses') }}" method="POST">
                    @csrf
                <p>
                    Search by date <input type="date" required name="date" class="form-select">
                    <input type="submit" class="btn btn-primary btn-sm m-1" value="Search">
                </p>
                </form>
            </span>

            <h5>Total: Rs. {{ $total }} </h5>
            
            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date(y-m-d) & Time</th>
                        <th>Added By</th>
                        <th>Designation</th>
                        <th>Photo</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($expenses as $expense )
                            <tr>
                                <th>{{ $expense->id }}</th>
                                <td>{{ $expense->category }}</td>
                                <td>{{ $expense->sub_category }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td>{{ $expense->status }}</td>
                                <td>{{ $expense->created_at }}</td>
                                <td>{{ $expense->added_by }}</td>
                                <td>{{ $expense->user_designation }}</td>
                                <td class="text-center"> 
                                    <img src="{{ asset('uploads/'.$expense->image_path) }}" width="200" alt="">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            
            </div>
        </div>
@endsection