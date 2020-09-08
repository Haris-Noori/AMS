<?php
    include "../connect.php";

    $admin_id = $_GET["admin_id"];
    $action = $_GET["action"];

    /*echo "Admin: ".$admin_id;
    echo "\nAction: ".$action;*/

    if($action == "reset")
    {
        $qry = " UPDATE admins SET admin_pass='' WHERE admin_id = '$admin_id' ";
        if($con->query($qry))
        {
            $msg = "Password Reset!!";
            header("Location:all_admins.php?Message=$msg");
        }
        else
        {
            $msg = "Something went wrong!";
            header("Location:all_admins.php?Message=$msg");
        }
    }

    if($action == "delete")
    {
        $qry = " DELETE FROM admins WHERE admin_id = '$admin_id' ";
        if($con->query($qry))
        {
            header("Location:all_admins.php");
        }
        else
        {
            $msg = "Something went wrong!";
            header("Location:all_admins.php?Message=$msg");
        }
    }