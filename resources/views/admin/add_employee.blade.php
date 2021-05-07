@extends('admin.index')

@section('pageContent')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Employee</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="col-md-12">
    <div class="float-right" >Joining Date: <strong><?php date_default_timezone_set("Asia/Karachi"); echo date("d M, Y") ?></strong></div>
    <h4>Employee Form</h4>
    <form action="{{ url('/admin/add_employee') }}" method="POST" class="col-md-12 mt-1">
        @csrf
        <div class="form-group col-md-6 btn-outline-warning">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">First Name</label>
                            <input name="st_first_name" type="text" required class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input name="st_last_name" type="text" required class="form-control" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Father Name</label>
                            <input name="st_father_name" type="text" class="form-control" placeholder="Father Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select name="st_gender" required class="form-control" required id="exampleFormControlSelect1">
                                <option value="N/A">Not Specified</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Date Of Birth</label>
                            <div class="row"><input name="st_dob" type="date" required pattern="de-m-YYYY" max="2010-12-31" placeholder="dd-mm-yyyy" id="st_dob" class="form-control ml-3 col-md-7">
                                <span id="st_age" class="ml-2">Age: </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select name="st_blood" required class="form-control"  id="exampleFormControlSelect1">
                                <option value="N/A">Not Specified</option>
                                <option value="A-">A +ve</option>
                                <option value="A+">A -ve</option>
                                <option value="B+">B +ve</option>
                                <option value="B-">B -ve</option>
                                <option value="O+">O +ve</option>
                                <option value="O-">O -ve</option>
                                <option value="AB+">AB +ve</option>
                                <option value="AB-">AB -ve</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">CNIC</label>
                            <input name="st_father_cnic" type="number" class="form-control" placeholder="no dashes(-)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Marital Status</label>
                            <select name="st_status" class="form-control" id="exampleFormControlSelect1">
                                <option value="N/A">Not Specified</option>
                                <option value="Married">Married</option>
                                <option value="Un-Married">Un-Married</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input name="st_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInput">Phone Number</label>
                            <input name="st_phone" type="tel" class="form-control col-md-12 phone" id="st_phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleFormControlTextarea1">Current Address</label>
                            <input name="st_cur_st_add" type="text" placeholder="Street Address" class="form-group form-control">
                            <input name="st_cur_city_add" type="text" placeholder="City/Village" class="form-control form-group">
                            <input name="st_cur_dis_add" type="text" placeholder="State/District" class="form-control form-group">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">Permanent Address</label>
                            <input name="st_perm_st_add" type="text" placeholder="Street Address" class="form-group form-control">
                            <input name="st_perm_city_add" type="text" placeholder="City/Village" class="form-control form-group">
                            <input name="st_perm_dis_add" type="text" placeholder="State/District" class="form-control form-group">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleFormControlTextarea1">Medical Information</label>
                            <textarea name="st_medical_info" rows="3" class="form-control" placeholder="Any medical disability"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">Additional Information</label>
                            <textarea name="st_add_info" rows="3" class="form-control" placeholder="500 Characters allowed"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Employee Type</label>
                            <select name="st_status" class="form-control" id="exampleFormControlSelect1">
                                <option value="N/A">Not Specified</option>
                                <option value="">Faculty</option>
                                <option value="">Accountant</option>
                                <option value="">Driver</option>
                                <option value="">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Joining Date</label>
                            <input name="st_dob" type="date" required pattern="de-m-YYYY" max="2010-12-31" placeholder="dd-mm-yyyy" id="st_dob" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Basic Salary</label>
                            <input name="st_father_cnic" type="number" class="form-control" placeholder="In Rupees">
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Bank Account</label>
                            <input name="st_father_cnic" type="text" class="form-control" placeholder="IBAN Number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Job Status</label>
                            <select name="st_status" class="form-control" id="exampleFormControlSelect1">
                                <option value="N/A">Not Specified</option>
                                <option value="">On Job</option>
                                <option value="">On Vocation</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <label>Employee Image</label>
                    <br>
                    <img style="height: 200px; width: 250px" id='img-upload'/>
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    <span class="btn btn-primary">Choose Photo</span><input name="st_image" type="file" id="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly hidden>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="form-group col-md-12">
                            <label>Upload Documents(if any)</label>
                            <br>
                            <input name="st_docs[]" type="file" class="btn btn-primary col-md-12" multiple>
                        </div>
                    </div>
                </div>
                
                <!-- Button Div -->
                <div class="col-md-8">
                    <button name="add-btn" type="submit" class="btn btn-success btn-block">Add Employee <span class="fa fa-user-plus"></span></button>
                </div>
            </div>
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
<script>

    // Student Phone Number Validation Tests
    $('#st_phone').focusout(function () {
        var st_phone_chars = $('#st_phone').val().length;
        console.log("Phone number characters: " + st_phone_chars);

        if(st_phone_chars < 11 || st_phone_chars > 11)
        {
            //alert("Phone Number Must be 11 Digits");
            $('#st_phone').addClass('border-danger');
        }
        else if ($('#st_phone').val() < 0)
        { alert("Invalid Number!");
            $('#st_phone').addClass('border-danger'); }
        else
        {
            $('#st_phone').removeClass('border-danger');
        }

    });

    // Father's Phone Number Validation Tests
    $('#st_father_phone').focusout(function () {
        var st_phone_chars = $('#st_father_phone').val().length;
        console.log("Phone number characters: " + st_phone_chars);

        if(st_phone_chars < 11 || st_phone_chars > 11)
        {
            //alert("Phone Number Must be 11 Digits");
            $('#st_father_phone').addClass('border-danger');
        }
        else if ($('#st_father_phone').val() < 0)
        { alert("Invalid Number!");
            $('#st_father_phone').addClass('border-danger'); }
        else
        {
            $('#st_father_phone').removeClass('border-danger');
        }
    });

    // Guardian's Phone Number Validation Tests
    $('#st_guard_phone').focusout(function () {
        var st_phone_chars = $('#st_guard_phone').val().length;
        console.log("Phone number characters: " + st_phone_chars);

        if(st_phone_chars < 11 || st_phone_chars > 11)
        {
            // alert("Phone Number Must be 11 Digits");
            $('#st_guard_phone').addClass('border-danger');
        }
        else if ($('#st_guard_phone').val() < 0)
        { alert("Invalid Number!");
            $('#st_guard_phone').addClass('border-danger'); }
        else
        {
            $('#st_guard_phone').removeClass('border-danger');
        }
    });

    // Student Reference Number
    $('#st_ref_num').focusout(function () {
        var st_phone_chars = $('#st_ref_num').val().length;
        console.log("Phone number characters: " + st_phone_chars);

        if(st_phone_chars < 11 || st_phone_chars > 11)
        {
            // alert("Phone Number Must be 11 Digits");
            $('#st_ref_num').addClass('border-danger');
        }
        else if ($('#st_ref_num').val() < 0)
        { alert("Invalid Number!");
            $('#st_ref_num').addClass('border-danger'); }
        else
        {
            $('#st_ref_num').removeClass('border-danger');
        }
    });

    $('#st_dob').change(function () {
        console.log($('#st_dob').val());

        var st_dob = new Date($('#st_dob').val());
        var today = new Date();
        var st_age = Math.floor( (today - st_dob) / (365.25 * 24 * 60 * 60 * 1000) );
        console.log("St Age: " + st_age);
        $('#st_age').text("Age: " + st_age);
    });

    $('.st_resid_status').click(function () {
        if($('.st_resid_status').val() === 'Hosteler')
        {
            $('#st_room_no').attr('disabled', false);
            $('#st_room_no').attr('enabled', true);

            $('#matressCheck').attr('disabled', false);
            $('#matressCheck').attr('enabled', true);

            $('#bedCheck').attr('disabled', false);
            $('#bedCheck').attr('enabled', true);

            $('#pillowCheck').attr('disabled', false);
            $('#pillowCheck').attr('enabled', true);
        }
        else {
            $('#st_room_no').attr('enabled', false);
            $('#st_room_no').attr('disabled', true);
            $('#st_room_no').val(0);

            $('#matressCheck').attr('enabled', false);
            $('#matressCheck').attr('disabled', true);

            $('#bedCheck').attr('enabled', false);
            $('#bedCheck').attr('disabled', true);

            $('#pillowCheck').attr('enabled', false);
            $('#pillowCheck').attr('disabled', true);
        }
    })

    // On Next Button Clicked
    $('#btn-next-modal').click(function () {

        // Suit Checkbox
        var $suitCheck = $('#suitCheck');
        if($suitCheck.prop("checked") === true)
        {
            $suitCheck.val('yes');
            console.log('yes');
        } else {
            $suitCheck.val('no');
            console.log('no');
        }

        // Cap Checkbox
        var $capCheck = $('#capCheck');
        if($capCheck.prop("checked") === true)
        {
            $capCheck.val('yes');
            console.log('yes');
        } else {
            $capCheck.val('no');
            console.log('no');
        }

        // Matress Checkbox
        var $matressCheck = $('#matressCheck');
        if($matressCheck.prop("checked") === true)
        {
            $matressCheck.val('yes');
            console.log('yes');
        } else {
            $matressCheck.val('no');
            console.log('no');
        }

        // Bed CheckBox
        var $bedCheck = $('#bedCheck');
        if($bedCheck.prop("checked") === true)
        {
            $bedCheck.val('yes');
            console.log('yes');
        } else {
            $bedCheck.val('no');
            console.log('no');
        }

        // Pillow CheckBox
        var $pillowCheck = $('#pillowCheck');
        if($pillowCheck.prop("checked") === true)
        {
            $pillowCheck.val('yes');
            console.log('yes');
        } else {
            $pillowCheck.val('no');
            console.log('no');
        }
    })

    // Checks On Student Fee Status
    $('.st_fee_status').click(function () {
        if($('.st_fee_status').val() === 'Free')  //if free, then no fee amount
        {
            $('#fee_amount').attr('disabled',true);
            $('.fee_plan').attr('disabled',true);
            $('#fee_amount').attr('enabled',false);
            $('.fee_plan').attr('enabled',false);

            $('#fee_amount').val(0);
            $('.fee_plan').val('Nil');
        }
        else
        {
            $('#fee_amount').attr('enabled',true);
            $('.fee_plan').attr('enabled',true);
            $('#fee_amount').attr('disabled',false);
            $('.fee_plan').attr('disabled',false);
        }
    })

</script>
@endsection
