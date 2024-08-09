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
            include('./menu.php');
            include('./dbconnection.php');
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
                <h1 class="h3 mb-2 text-gray-800">View Users</h1>
                <p class="mb-4">Here below list of users are displayed.you can search any plant by typeing it's name into search box.as well in the last column you can edit,delete the user.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Created Date</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $productQry = "SELECT * FROM users WHERE active = 1";
                                        $rs = mysqli_query($conn,$productQry);
                                        
                                        if(mysqli_num_rows($rs) > 0) {
                                            $i = 1;
                                            while($row = mysqli_fetch_assoc($rs)) {

                                    ?>
                                    <tr class="category-<?php echo $row['id']?>">
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['first_name']?></td>
                                        <td><?php echo $row['last_name']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['gender'] == 1 ? "Male" : "Female" ?></td>
                                        <td><?php echo $row['mobile_no']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['doi']?></td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-circle btn-sm" id="deleteusers" data-id="<?php echo $row['id']?>" data-toggle="modal" data-target="#deleteModal">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
                        <span>&copy Copyright <?php echo date('Y')?> Dudhat Industries Pvt. Ltd. All Right Reserved.</span>
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
            if(isset($_GET['successinsert']))
            {
                echo 'swal("Success","User inserted successfully!","success");';
            }
            if(isset($_GET['errorinsert']))
            {
                echo 'swal("Fail","User not inserted!","warning");';
            }
            if(isset($_GET['successupdate']))
            {
                echo 'swal("Success","User updated successfully!","success");';
            }
            if(isset($_GET['errorupdate']))
            {
                echo 'swal("Fail","User not updated!","warning");';
            }
            if(isset($_GET['successdelete']))
            {
                echo 'swal("Success","User deleted successfully!","success");';
            }
        ?>
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('click','#deleteusers',function(){
                var id =$(this).data("id");
                $(document).on('click','.final-delete',function(){
                    $.ajax
                    ({
                        type:'POST',
                        url: "deleteusers.php",
                        data:{user_id : id},
                        success: function(data){ 
                            //console.log(data); 
                            //location.relode('true');
                            //window.location.reload();
                             location.href = "viewusers.php?successdelete=Users deleted successfully.";
                            //$('.category-'+data).remove();
                        }
                    });
                });

            }); 
        });
   </script>
    
</body>

</html>
