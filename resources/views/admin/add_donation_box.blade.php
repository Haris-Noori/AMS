@extends('admin.index')

@section('pageContent')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Donation Box</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-md-12">
        <h4>Fill Donation Box Details</h4>

        <form action="{{ url('/admin/add-donation-box') }}" method="POST" class="col-md-10 mt-1">
        @csrf
        <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="ActivityDescription">Donation Box name</label>
                            <input name="box_name" type="text" class="form-control" id="ActivityDescription" placeholder="Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ActivityDescription">Reference Name</label>
                            <input name="reference" type="text" class="form-control" id="ActivityDescription" placeholder="Person Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Collector</label>
                            <select name="collector" class="form-control" id="exampleFormControlSelect1">
                                <option value="Hafeez Noori">Hafeez Noori</option>
                                <option value="Muhammad Irfan">Muhammad Irfan</option>
                                <option value="Ikhlaq Ahmed Noori">Ikhlaq Ahmed Noori</option>
                                <option value="Kazim ALi Shami">Kazim ALi Shami</option>
                                <option value="Haris Noori">Haris Noori</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Frequency</label>
                            <select name="frequency" class="form-control" id="exampleFormControlSelect1">
                                <option value="On wish">On wish</option>
                                <option value="Weekly">Weekly</option>
                                <option value="2 Weeks">2 Weeks</option>
                                <option value="Monthly">Monthly</option>
                                
                            </select>
                        </div>
                    </div>  

                    <div class="row">
                       <div class="form-group col-md-4">
                            <label for="ActivityDescription">Location Name</label>
                            <input name="location_name" type="text" class="form-control" id="ActivityDescription" placeholder="Any shop/institute name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ActivityDescription">Street Address</label>
                            <input name="address" type="text" class="form-control" id="ActivityDescription" placeholder="Area/Mohalla">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ActivityDescription">City</label>
                            <input name="city" type="text" class="form-control" id="ActivityDescription" placeholder="Mandi Sadiq Gunj...">
                        </div>
                    </div>
                       
                </div>
            </div>
            

            <div class="form-group">
                <button name="add-btn" type="submit" class="btn btn-success col-md-4 float-right mt-5">Add Donation Box</button>
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