@extends('admin.index')

@section('pageContent')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expenses / Add Expense</h1>
        <a href="{{ url('/admin/expenses') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-th-list fa-sm text-white-50"></i> Show Expenses</a>
    </div>

    <div class="col-md-12">
        <h4>Expense Details</h4>

        @if ($errors->any())
            <div class="col-md-4 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="col-md-4 alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ url('/admin/add-expense') }}" method="POST" class="col-md-10 mt-1" enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Category*</label>
                            <select name="category" class="form-control" required>
                                <option value="Other">Other</option>
                                <option value="Bill">Bill</option>
                                <option value="Food">Food</option>
                                <option value="Salary">Salary</option>
                                <option value="Construction">Construction</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Sub Category*</label>
                            <select name="sub_category" class="form-control" id="exampleFormControlSelect1" required>
                                <option value="Other">Other (if Other category is selected)</option>
                                <optgroup label="Bill">
                                    <option value="Internet">Internet</option>
                                    <option value="Electricity">Electricity</option>
                                    <option value="Gas">Gas</option>
                                    <option value="Water">Water</option>
                                    <option value="Other">Other</option>
                                </optgroup>
                                <optgroup label="Food">
                                    <option value="Flour">Flour</option>
                                    <option value="Rice">Rice</option>
                                    <option value="Oil">Oil</option>
                                    <option value="Ghee">Ghee</option>
                                    <option value="Other">Other</option>
                                </optgroup>
                                <option value="Salary">Salary</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="ActivityDescription">Description (must write description, if selected other)</label>
                            <input name="description" type="text" class="form-control" placeholder="paid yesterday by me..">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ActivityDescription">Amount Rs*</label>
                            <input name="amount" type="number" min="0" class="form-control" placeholder="0" required>
                        </div>
                    </div>  

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Status*</label>
                            <select name="status" class="form-control" required>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                            </select>
                        </div>
                       <div class="form-group col-md-6">
                            <label for="StartTime">Upload picture(optional)</label>
                            <input name="image" type="file" class="form-control btn btn-primary" placeholder="Choose photo">
                        </div>
                    </div>
                       
                </div>
            </div>
            

            <div class="form-group">
                <button name="add-btn" type="submit" class="btn btn-success col-md-4 float-right mt-4"><i class="fa fa-plus fa-sm"></i> Add Expense</button>
            </div>
            <div class="form-group col-md-6 btn-outline-warning">
            
            </div>
        </form>
    </div>

    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        #img-upload{
            width: 100%;
        }
    </style>

@endsection