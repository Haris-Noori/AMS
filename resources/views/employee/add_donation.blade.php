@extends('employee.index')

@section('pageContent')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Donation Collection</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="col-md-12">
        <h4>Donation Details</h4>

        <form action="{{ url('employee/add-donation') }}" method="POST" class="col-md-10 mt-1">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Select Donation Box</label>
                            <select name="box_name" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($donation_boxes as $donation_box)
                                    <option value="{{ $donation_box->box_name }}">{{ $donation_box->box_name }}</option>
                                @endforeach
                                {{-- <option value="Lahore-1">Lahore-1</option>
                                <option value="Lahore-2">Lahore-2</option>
                                <option value="Mandi-1">Mandi-1</option>
                                <option value="Mandi-2">Mandi-2</option> --}}
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ActivityDescription">Amount Collected</label>
                            <input name="amount_collected" type="number" min="0" class="form-control" id="ActivityDescription" placeholder="1000">
                        </div>
                    </div>
                   
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label for="StartTime">Upload picture(optional)</label>
                            <input name="" type="file" class="form-control btn btn-primary" placeholder="Choose photo">
                        </div>
                        
                    </div>
                   
                    
                </div>
            </div>
            <div class="form-group">
            <span></span>
                <button name="add-btn" type="submit" class="btn btn-success col-md-4 float-right mt-2"> <i class="fa fa-plus"></i>Add Donation</button>
            </div>
            <div class="form-group col-md-6 btn-outline-warning">
                
            </div>
        </form>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection