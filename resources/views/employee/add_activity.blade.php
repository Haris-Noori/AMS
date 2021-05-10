@extends('employee.index')

@section('pageContent')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Activity</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-md-12">
        <h4>Fill activity form</h4>

        <form action="{{ url('/addNewAdmin') }}" method="POST" class="col-md-10 mt-1">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Select Activity</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                <option value="normal">Attending Meeting</option>
                                <option value="super">Gardening</option>
                                <option value="super">Cleaning Washrooms</option>
                                <option value="super">Had a break</option>
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
                            <input name="time" type="time" class="form-control" id="StartTime" placeholder="Start Time">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="EndTime">End time of activity</label>
                            <input name="time" type="time" class="form-control" id="EndTime" placeholder="End Time">
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
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });
    </script>
@endsection