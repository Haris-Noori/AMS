@extends('employee.index')

@section('pageContent')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Activity</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-md-12">
        <h4>Fill activity form</h4>

        <form action="{{ url('employee/add-activity') }}" method="POST" class="col-md-10 mt-1">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Select Activity</label>
                            <select name="activity_type" class="form-control" id="exampleFormControlSelect1">
                                <option value="Attending Meeting">Attending Meeting</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Cleaning Washrooms">Cleaning Washrooms</option>
                                <option value="Had a break">Had a break</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ActivityDescription">Tell about your activity</label>
                            <input name="description" type="text" class="form-control" id="ActivityDescription" placeholder="Activity Description">
                        </div>
                    </div>
                   
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label for="StartTime">Start time of activity</label>
                            <input name="begin_time" type="time" class="form-control" id="StartTime" placeholder="Start Time">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="EndTime">End time of activity</label>
                            <input name="end_time" type="time" class="form-control" id="EndTime" placeholder="End Time">
                        </div>
                    </div>
                   
                    
                </div>
            </div>
            <div class="form-group">
            <span></span>
                <button name="add-btn" type="submit" class="btn btn-success col-md-4 float-right mt-5">Add Activity</button>
            </div>
            <div class="form-group col-md-6 btn-outline-warning">
                
            </div>
        </form>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection