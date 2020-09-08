<?php

    if(isset($_POST["add-btn"]))
    {
        include "../connect.php";

        $st_first_name = $_POST["st_first_name"];
        $st_last_name = $_POST["st_last_name"];
        $st_gender = $_POST["st_gender"];
        $st_dob = $_POST["st_dob"];
        $st_blood = $_POST["st_blood"];
        $st_phone = $_POST["st_phone"];

        // Current Address Info
        $st_add_type_cur = "current";
        $st_cur_st_add = $_POST["st_cur_st_add"];
        $st_cur_city_add = $_POST["st_cur_city_add"];
        $st_cur_dis_add = $_POST["st_cur_dis_add"];

        //Permanent Address Info
        $st_add_type_perm = "permanent";
        $st_perm_st_add = $_POST["st_perm_st_add"];
        $st_perm_city_add = $_POST["st_perm_city_add"];
        $st_perm_dis_add = $_POST["st_perm_dis_add"];

        $st_email = $_POST["st_email"];
        $st_status = $_POST["st_status"];
        $st_medical_info = $_POST["st_medical_info"];
        $st_add_info = $_POST["st_add_info"];
        $st_image = $_POST["st_image"];


        //Student Guardian Info
        $st_father_name = $_POST["st_father_name"];
        $st_father_phone = $_POST["st_father_phone"];
        $st_father_cnic = $_POST["st_father_cnic"];
        $st_father_occup = $_POST["st_father_occup"];
        $st_mother_name = $_POST["st_mother_name"];
        $st_guard_name = $_POST["st_guard_name"];
        $st_guard_rel = $_POST["st_guard_rel"];
        $st_guard_phone = $_POST["st_guard_phone"];

        // Student Education Info
        $st_edu_title = $_POST["st_edu_title"];
        $st_edu_inst = $_POST["st_edu_inst"];
        $st_edu_year = $_POST["st_edu_year"];
        $st_edu_info = $_POST["st_edu_info"];

        // Student Course Enrollment Info
        $st_crs_title = $_POST["st_crs_title"];
        $st_crs_time = $_POST["st_crs_time"];

        // Student Residence Info
        $st_resi_status = $_POST["st_resi_status"];

        // Student Accommodation Info
        $st_food = $_POST["st_food"];
        $st_locker_no = $_POST["st_locker_no"];
        if(empty($_POST["st_room_no"]))
        {   $_POST["st_room_no"] = 0;   }
        $st_room_no = $_POST["st_room_no"];

        if(empty($_POST["st_uniform"]))
        {  $_POST["st_uniform"] = "no"; }
        $st_uniform = $_POST["st_uniform"];

        if(empty($_POST["st_cap"]))
        { $_POST["st_cap"] = "no"; }
        $st_cap = $_POST["st_cap"];

        if(empty($_POST["st_matress"]))
        { $_POST["st_matress"] = "no"; }
        $st_matress = $_POST["st_matress"];

        if(empty($_POST["st_bedsheet"]))
        {  $_POST["st_bedsheet"] = "no"; }
        $st_bedsheet = $_POST["st_bedsheet"];

        if(empty($_POST["st_pillow"]))
        { $_POST["st_pillow"] = "no"; }
        $st_pillow = $_POST["st_pillow"];

        echo "Uniform: ".$st_uniform;
        echo "\nCap: ".$st_cap;
        echo "\nMatress: ".$st_matress;
        echo "\nBedsheet: ".$st_bedsheet;
        echo "\nPillow: ".$st_pillow;

        //Student Academic Info

        //Student Documents Files
        $st_docs = array();
        $st_docs = $_POST["st_docs"];
        $total = count($st_docs);
//        echo "Total Files: ".$total;

        $flag = 0;
        $qry_check_unique_name = " SELECT st_first_name, st_last_name FROM students ";
        if($con->query($qry_check_unique_name))
        {
            $res = $con->query($qry_check_unique_name);
                while($row = $res->fetch_assoc())
                {
                    if( ($row["st_first_name"] == $st_first_name) && ($row["st_last_name"] == $st_last_name) )
                    {
                        $flag = 1;
                    }
                }

                // If Duplicate Name Found
                if($flag == 1)
                {
                    $msg = "Student with this name already exists:(";
                    header("Location: add_student.php?Message=$msg");
                }
                else  // Register this New Student
                {
                    // Inserting Student General Info
                    $qry = " INSERT INTO students(st_first_name, st_last_name, st_gender, st_dob, st_blood, st_phone, st_email, st_status, st_medical_info, st_add_info, st_image)
                    VALUES('$st_first_name' , '$st_last_name', '$st_gender', '$st_dob', '$st_blood', '$st_phone', '$st_email', '$st_status', '$st_medical_info', '$st_add_info', '$st_image') ";

                    if($con->query($qry)) {

                        echo "Query 1: OK\n";
                        $qry_2 = " SELECT st_id FROM students  WHERE st_first_name='$st_first_name' AND st_last_name='$st_last_name' ";
                        $res = $con->query($qry_2);
                        $row = $res->fetch_assoc();
                        $st_id = $row["st_id"];
                        echo "<br>";
                        echo "Student ID: " . $st_id;

                        // Inserting Student Father/Guardian's Info
                        $qry_3 = " INSERT INTO student_guardian(st_id, st_father_name, st_father_phone, st_father_cnic,	st_father_occup, st_mother_name, st_guard_name,	st_guard_rel, st_guard_phone)
                        VALUES('$st_id', '$st_father_name', '$st_father_phone', '$st_father_cnic', '$st_father_occup', '$st_mother_name', '$st_guard_name', '$st_guard_rel', '$st_guard_phone') ";

                        if ($con->query($qry_3)) {
                            echo "<br>Query 3: OK";
                        }
                        else
                        { echo "<br>Something wrong in Query 3\n"; }

                        // Inserting Student Documents
                        echo "<br>";
                        for ($i = 0; $i < $total; $i++) {
                            $qry_5 = " INSERT INTO student_docs(st_id, st_file) VALUES('$st_id', '$st_docs[$i]') ";
                            $con->query($qry_5);
                            echo "File " . $st_docs[$i] . " Inserted. ";
                        }

                        // Inserting Student Current Address Info
                        $qry_6 = " INSERT INTO student_address(st_id, st_add_type, st_st_add, st_city_add, st_dis_add) VALUES('$st_id', '$st_add_type_cur', '$st_cur_st_add', '$st_cur_city_add', '$st_cur_dis_add') ";
                        if ($con->query($qry_6)) {
                            echo "<br>Query 6: OK";
                        }

                        // Inserting Student Permanent Address Info
                        $qry_7 = " INSERT INTO student_address(st_id, st_add_type, st_st_add, st_city_add, st_dis_add) VALUES ('$st_id', '$st_add_type_perm', '$st_perm_st_add', '$st_perm_city_add', '$st_perm_dis_add') ";
                        if ($con->query($qry_7)) {
                            echo "<br>Query 7: OK";
                        }

                        // Inserting Student Education Information
                        $qry_8 = " INSERT INTO student_education(st_id, st_edu_title, st_edu_inst, st_edu_year, st_edu_info) VALUES('$st_id', '$st_edu_title', '$st_edu_inst', '$st_edu_year', '$st_edu_info') ";
                        if($con->query($qry_8)) {
                            echo "<br>Query 8: OK";
                        }
                        else {
                            echo "Something Wrong in Query 8";
                            echo $con->error;
                        }

                        // Inserting Student Course Enrollment Information
                        $qry_9 = " INSERT INTO student_course(st_id, st_crs_title, st_crs_time) VALUES('$st_id', '$st_crs_title', '$st_crs_time') ";
                        if($con->query($qry_9)){
                            echo "<br>Query 9: OK";
                        } else{
                            echo "<br>Query 9: Something Wrong!";
                        }

                        // Inserting Student Residence Information
                        $qry_10 = " INSERT INTO student_residence(st_id, st_resi_status) VALUES('$st_id', '$st_resi_status') ";
                        if($con->query($qry_10)){
                            echo "<br>Query 10: OK";
                        } else{
                            echo "<br>Query 10: Something Wrong!";
                        }

                        // Inserting Student Accommodation Information
                        $qry_11 = " INSERT INTO student_accom(st_id, st_food, st_locker_no, st_room_no, st_uniform, st_cap, st_matress, st_bedsheet, st_pillow) VALUES('$st_id', '$st_food', '$st_locker_no', '$st_room_no', '$st_uniform', '$st_cap', '$st_matress', '$st_bedsheet', '$st_pillow') ";
                        if($con->query($qry_11)){
                            echo "<br>Query 11: OK";
                        } else{
                            echo "<br>Query 11: Something Wrong!";
                        }

                        // Inserting Student School Joining Date
                        date_default_timezone_set("Asia/Karachi");
                        $st_join_date = date("Y-m-d");
                        echo "<br>Join Date: ".$st_join_date;
                        $qry_join_date = " INSERT INTO student_joining(st_id, st_join_date) VALUES('$st_id', '$st_join_date') ";
                        if($con->query($qry_join_date)){
                            echo "<br>Query Join Date: OK";
                        } else{
                            echo "<br>Query Join Date: Something Wrong!";
                        }


                        $msg = "New Student Registered!";
                        header("Location: add_student.php?Message=$msg");
                    }
                    else
                    {
                        echo "<br>Admin NOT Inserted\n";
                        echo $con->error;
                        $msg = "Admin NOT Inserted, something went wrong!";
                        //header("Location: add_student.php?Message=$msg");
                    }
                }
        }


    }
