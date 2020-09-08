<?php
    if(isset($_POST["add-btn"]))
    {
        include "../connect.php";
        $admin_name = $_POST["admin_name"];
        $admin_pass = $_POST["admin_pass"];
        $admin_type = $_POST["admin_type"];
        $admin_image = $_POST["admin_image"];

        $qry = " INSERT INTO admins(admin_name, admin_pass, admin_type, admin_image) VALUES('$admin_name' , '$admin_pass', '$admin_type', '$admin_image') ";

        if($con->query($qry))
        {
            $msg = "New Admin Created!";
            header("Location: add_admin.php?Message=$msg");
        }
        else
        {
            $msg = "Admin NOT Inserted, something went wrong!";
            header("Location: add_admin.php?Message=$msg");
        }
    }
