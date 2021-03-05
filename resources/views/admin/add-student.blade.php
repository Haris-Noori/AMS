@extends('admin.index')

@section('pageContent')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Student</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="col-md-12">
    <div class="float-right" >Joining Date: <strong><?php date_default_timezone_set("Asia/Karachi"); echo date("d M, Y") ?></strong></div>
    <h3>Student Registration Form</h3>
    <form action="add_student_try.php" method="POST" class="col-md-12 mt-1">
        <div class="form-group col-md-6 btn-outline-warning">
            <?php
            if(isset($_GET["Message"]))
            {
                echo $_GET["Message"];
            }
            ?>
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
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select name="st_gender" class="form-control" required id="exampleFormControlSelect1">
                                <option value="Not Specified">Not Specified</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Date Of Birth</label>
                            <div class="row"><input name="st_dob" type="date" pattern="d-m-YY" max="2010-12-31" placeholder="dd-mm-yyyy" id="st_dob" class="form-control ml-3 col-md-7">
                                <span id="st_age" class="ml-2">Age: </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select name="st_blood" class="form-control"  id="exampleFormControlSelect1">
                                <option value="Not Specified">Not Specified</option>
                                <option value="">A +ve</option>
                                <option value="">A -ve</option>
                                <option value="">B +ve</option>
                                <option value="">B -ve</option>
                                <option value="">O +ve</option>
                                <option value="">O -ve</option>
                                <option value="">AB +ve</option>
                                <option value="">AB -ve</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Student Status</label>
                            <select name="st_status" class="form-control" id="exampleFormControlSelect1">
                                <option value="Not Specified">Not Specified</option>
                                <option value="Genious">Genious</option>
                                <option value="Addled">Addled</option>
                                <option value="Very Poor">Very Poor</option>
                                <option value="Normal">Normal</option>
                                <option value="Genious & Beautiful Voice">Genious & Beautiful Voice</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleFormControlTextarea1">Student Current Address</label>
                            <input name="st_cur_st_add" type="text" placeholder="Street Address" class="form-group form-control">
                            <input name="st_cur_city_add" type="text" placeholder="City/Village" class="form-control form-group">
                            <input name="st_cur_dis_add" type="text" placeholder="State/District" class="form-control form-group">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">Student Permanent Address</label>
                            <input name="st_perm_st_add" type="text" placeholder="Street Address" class="form-group form-control">
                            <input name="st_perm_city_add" type="text" placeholder="City/Village" class="form-control form-group">
                            <input name="st_perm_dis_add" type="text" placeholder="State/District" class="form-control form-group">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input name="st_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInput">Student Phone No.</label>
                            <input name="st_phone" type="tel" class="form-control col-md-12 phone" id="st_phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleFormControlTextarea1">Student Medical Information</label>
                            <textarea name="st_medical_info" rows="3" class="form-control" placeholder="Any medical disability"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">Student Additional Information</label>
                            <textarea name="st_add_info" rows="3" class="form-control" placeholder="500 Characters allowed"></textarea>
                        </div>
                    </div>

                    <!-- Student Guardian Information -->
                    <hr>
                    <h4>Student Father's/Guardian's Information</h4>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Student's Father Name</label>
                            <input name="st_father_name" type="text" class="form-control" placeholder="Father Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInput">Father Phone No.</label>
                            <input name="st_father_phone" type="tel" class="form-control phone" id="st_father_phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Father's CNIC</label>
                            <input name="st_father_cnic" type="number" class="form-control" placeholder="no dashes(-)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Father's Occupation</label>
                            <input name="st_father_occup" type="text" class="form-control" placeholder="Govt.servant / Private Business">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Student's Mother Name</label>
                            <input name="st_mother_name" type="text" class="form-control" placeholder="Mother Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Guardian Name</label>
                            <input name="st_guard_name" type="text" class="form-control" placeholder="If any,">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="exampleInputEmail1">Relation with Guardian</label>
                            <input name="st_guard_rel" type="text" class="form-control" placeholder="Chacha/Mamoo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInput">Guardian Phone No.</label>
                            <input name="st_guard_phone" type="tel" id="st_guard_phone" class="form-control phone">
                        </div>
                    </div>

                    <!-- NEXT BUTTON -->
                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-block col-md-12">Next <span class="fa fa-arrow-right"></span></button>

                    <!-- Student's Education Information Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Student's Education Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h6><strong>Latest qualification</strong></h6>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Course/Qualification Name</label>
                                            <input name="st_edu_title" type="text" class="form-control" placeholder="Matric, F.Sc etc.">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Institute/School/College Name</label>
                                            <input name="st_edu_inst" type="text" class="form-control" placeholder="Model School">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Passing Out</label>
                                            <input name="st_edu_year" type="date" class="form-control" placeholder="Month-Year">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Description</label>
                                            <input name="st_edu_info" type="text" class="form-control" placeholder="Additional Information">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                    <button type="button" data-toggle="modal" data-target="#ModalCourses" class="btn btn-primary">Next <span class="fa fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ends Here -->

                    <!-- Modal Student Course Registration -->
                    <div class="modal fade" id="ModalCourses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Student's Course Enrollment</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlSelect1">Select Course</label>
                                            <select name="st_crs_title" class="form-control"  id="exampleFormControlSelect1">
                                                <option value="Not Specified">Not Specified</option>
                                                <option value="Naazra">Naazra | نظرة القرآن</option>
                                                <option value="Hifz">Hifz | حفظ القرآن</option>
                                                <option value="Dars-e-Nazami">Dars e Nazami | دارس ونظامي</option>
                                                <option value="Computer">Computer Course</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlSelect1">Select Timing</label>
                                            <select name="st_crs_time" class="form-control"  id="exampleFormControlSelect1">
                                                <option value="Not Specified">Not Specified</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                                <option value="Evening">Evening</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><strong>Student's Residence</strong></h5>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select Residential Status</label>
                                        <select name="st_resi_status" class="form-control st_resid_status"  id="exampleFormControlSelect1">
                                            <option value="Not Specified">Not Specified</option>
                                            <option value="Day Scholar">Day Scholar</option>
                                            <option value="Hosteler">Hosteler</option>
                                        </select>
                                    </div>

                                    <hr>
                                    <h5><strong>Student Accommodation/Facilities</strong></h5>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleFormControlSelect1">Food</label>
                                            <select name="st_food" class="form-control"  id="exampleFormControlSelect1">
                                                <option value="No Food">No Food</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Lunch">Lunch</option>
                                                <option value="Dinner">Dinner</option>
                                                <option value="Breakfast + Lunch">Breakfast + Lunch</option>
                                                <option value="Full Time">Full Time</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Locker No.</label>
                                            <input name="st_locker_no" type="number" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Room No.</label>
                                            <input name="st_room_no" type="number" class="form-control" id="st_room_no">
                                        </div>
                                    </div>

                                    <!-- Check Boxes -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input name="st_uniform" checked class="form-check-input" type="checkbox" id="suitCheck">
                                                <label class="form-check-label" for="gridCheck">Uniform(Shalwar Kameez)</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="form-check">
                                                <input name="st_cap" checked class="form-check-input" type="checkbox" id="capCheck">
                                                <label class="form-check-label" for="gridCheck">Cap</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="form-check">
                                                <input name="st_matress" class="form-check-input" type="checkbox" id="matressCheck">
                                                <label class="form-check-label" for="gridCheck">Matress</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="form-check">
                                                <input name="st_bedsheet" class="form-check-input" type="checkbox" id="bedCheck">
                                                <label class="form-check-label" for="gridCheck">Bedsheet</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="form-check">
                                                <input name="st_pillow" class="form-check-input" type="checkbox" id="pillowCheck">
                                                <label class="form-check-label" for="gridCheck">Pillow</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                    <button type="button" id="btn-next-modal" data-toggle="modal" data-target="#ModalStudentFee" class="btn btn-primary">Next  <span class="fa fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ends Here -->

                    <!-- Modal Student Fee Section -->
                    <div class="modal fade" id="ModalStudentFee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="border: 2px solid black">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModallabel"><strong>Student Fee Section</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlSelect1">Fee Status</label>
                                            <select name="st_fee_status" class="form-control st_fee_status"  id="exampleFormControlSelect1">
                                                <option value="Paid">Paid</option>
                                                <option value="UnPaid">UnPaid</option>
                                                <option value="Free">Free</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInput">Fee Amount</label>
                                            <input name="st_fee_amount" type="number" id="fee_amount" min="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Donation Promise(if any)</label>
                                            <textarea name="st_donation" class="form-control" placeholder="monthly wheat 10kg e.g,"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlSelect1">Select Fee Plans</label>
                                            <select name="st_fee_plan" class="form-control fee_plan"  id="exampleFormControlSelect1">
                                                <option value="Monthly">Monthly</option>
                                                <option value="Quarterly">Quarterly (4 months)</option>
                                                <option value="Half">Half (6 months)</option>
                                                <option value="Annually">Annually (12 months)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><strong>Admission Reference</strong></h5>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Reference Name</label>
                                            <input name="st_ref_name" type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleEmail1">Phone No.</label><br>
                                            <input name="st_ref_num" type="tel" class="form-control phone" id="st_ref_num">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                    <button name="add-btn" type="submit" class="btn btn-success">Add Student <span class="fa fa-user-plus"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ends Here -->

                </div>
                <div class="col-md-4">
                    <label>Upload Student Image</label>
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
