<?php
    session_start();
    include "../connect.php";

    $admin_name = $_POST["admin_name"];
    $admin_pass = $_POST["admin_pass"];

    $qry = "SELECT * FROM admins WHERE admin_name = '$admin_name' ";

    // ----------------------- check if query working
    if($con->query($qry))
    {
        echo "Query run success";
    }
    else
    {
        echo "Query didn't run";
    }
    //---------------------------------------

    $res = $con->query($qry);    //storing result from query in this variable
    $msg = "";

    if($res->num_rows > 0)
    {   //admin exists
        $row = $res->fetch_assoc();

        if($row["admin_pass"] == $admin_pass)
        {   //password is correct
            $_SESSION["admin_name"] = $admin_name;
            $_SESSION["admin_type"] = $row["admin_type"];
            $_SESSION["admin_image"] = $row["admin_image"];

            //echo $SESSION["user"];
            header("Location:admin_dashboard.php");    //give admin the access to dashboard
        }
        else
        {   //password is incorrect
            $msg = "Invalid Password";
            header("Location:../../login.php?Message=$msg");
        }
    }
    else
    {   //admin does not exist
        $msg = " ".$admin_name." does not exist";
        header("Location:../../login.php?Message=$msg");
    }
