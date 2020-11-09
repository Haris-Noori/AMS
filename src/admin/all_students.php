<?php
include 'admin_header.php';
include '../connect.php';
?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Students</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Edit Details</th>
                    <th>Delete Student</th>
                </tr>
                </thead>
                <?php
                $qry = " SELECT * FROM students ";
                $res = $con->query($qry);
                $result = "";

                if($res->num_rows > 0)
                {
                while($row = $res->fetch_assoc())
                {

                ?>
                <tbody>
                <tr>
                    <th> <?php echo $row['st_id'] ?> </th>
                    <td> <?php echo $row['st_first_name'] ?> </td>
                    <td> <?php echo $row['st_last_name'] ?> </td>
                    <td> <?php echo $row['st_gender'] ?> </td>
                    <td> <?php echo $row['st_status'] ?> </td>
                    <td> <a href="all_admins_try.php?admin_id=<?php echo $row["admin_id"] ?>&action=edit"><button class="btn btn-primary">Edit</button></a> </td>
                    <td> <a href="all_admins_try.php?admin_id=<?php echo $row["admin_id"] ?>&action=delete"><button class="btn btn-danger">Remove</button></a> </td>
                </tr>
                <?php
                }
                }
                else
                {
                    echo "No Results Found";
                }
                ?>

                </tbody>
            </table>

            <!--MODAL-->
            <?php
            if(isset($_GET["Message"]))
            {
                echo '<script>alert("'.$_GET[Message].'")</script>';
            }
            ?>
        </div>
    </div>

<?php include 'admin_footer.php' ?>