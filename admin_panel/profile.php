<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./header.php');?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            include('./dbconnection.php');
            $id = $_GET['id'];
            $callFor = $_GET['callfor'];

            $profileQry = "SELECT * FROM users WHERE active = 1 AND id = '".$id."'";
            $rs = mysqli_query($conn,$profileQry);

            $row = mysqli_fetch_assoc($rs);
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("./navbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">View Profile</h1>
                <?php 
                    if ($callFor == "editprofile") {
                ?>
                <p class="mb-4">Here below one form is given just fill out and click on the "update" button for update your profile.</p>
                <?php
                    }
                ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="./viewcategories.php" class="btn btn-danger btn-md float-right" value="Cancel" name="cancel">Cancel</a>
                                <a href="./profile.php?id=<?php echo $id ?>&callfor=editprofile" class="btn btn-color btn-md float-right mr-1" name="edit profile">Edit Profile</a>
                            </div>
                        </div>
                        <form class="updateUser" name="updateUserFrm" action="./editprofileprocess.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" class="form-control form-control-fullName"
                                    id="firstName" name="firstName" value="<?php echo $row['first_name'] ? $row['first_name']: '';?>" <?php echo $callFor == 'profile' ? "disabled" : ""?>>
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text" class="form-control form-control-fullName"
                                    id="lastName" name="lastName" value="<?php echo $row['last_name'] ? $row['last_name']: '';?>" <?php echo $callFor == 'profile' ? "disabled" : ""?>>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control form-control-email"
                                    id="email" name="email" value="<?php echo $row['email'] ? $row['email'] : '';?>" <?php echo $callFor == 'profile' ? "disabled" : ""?>>
                            </div>
                            <?php 
                                if ($callFor == "editprofile") {
                            ?>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="text" class="form-control form-control-email"
                                    id="password" name="password" value="<?php echo $row['password'] ? base64_decode($row['password']) : '';?>">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input type="text" class="form-control form-control-email"
                                    id="cpassword" name="confirmpassword" value="<?php echo $row['password'] ? base64_decode($row['password']) : '';?>">
                            </div>

                            <?php
                                }
                            ?>
                            <?php 
                                if ($row['gender'] && $row['gender'] != 0) {
                            ?>
                                    <div class="form-group">
                                        <label>Gender:</label><br/>
                                        <input type="radio" id="maleGender" name="gender" value="Male" <?php echo $row['gender'] == 1 ? "checked" : ""; ?> <?php echo $callFor == 'profile' ? "disabled" : ""?>/>&nbsp;Male
                                        <input type="radio" id="femaleGender" name="gender" value="Female" <?php echo $row['gender'] == 2 ? "checked" : ""; ?> <?php echo $callFor == 'profile' ? "disabled" : ""?>/>&nbsp;Female
                                    </div>
                            <?php
                                }
                            ?>
                            <div class="form-group">
                                <label>Mobile:</label>
                                <input type="text" class="form-control form-control-mobile"
                                    id="mobile" name="mobile" value="<?php echo $row['mobile_no'] ? $row['mobile_no'] : "";?>" <?php echo $callFor == 'profile' ? "disabled" : ""?>>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea name="address" cols="20" rows="5" class="form-control form-control-address" <?php echo $callFor == 'profile' ? "disabled" : ""?>><?php echo $row['address'] ? $row['address'] : '';?></textarea>
                            </div>
                            <?php 
                                if ($callFor == "editprofile") {
                            ?>
                            <input type="submit" class="btn btn-color btn-md" value="Update" name="register"/>
                            <a href="./viewcategories.php" class="btn btn-danger btn-md" value="Cancel" name="cancel">Cancel</a>
                            <?php }
                            ?>
                        </form>
                    </div>
                </div>

                </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

   <?php include("./footer.php");?>
   <script  type="text/javascript">
        <?php
            if(isset($_GET['successprofile']))
            {
                echo 'swal("Success","Profile Updated Successfully!","success");';
            }
            if(isset($_GET['successerrprofile']))
            {
                echo 'swal("Fail","Profile not Updated Successfully!","warning");';
            }
        ?>
    </script>
</body>

</html>