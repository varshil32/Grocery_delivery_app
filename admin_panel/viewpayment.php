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
                <h1 class="h3 mb-2 text-gray-800">View Payments</h1>
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
                                        <th>User Name</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Payment Amount</th>
                                        <th>Status</th>
                                        <th>Date of Insertion</th>
                                        <th>Date of Updation</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $productQry = "SELECT pmt.*,usr.first_name, usr.last_name, cat.category_name, sub.subcategory_name, pro.product_name, pro.product_price, pro.product_description FROM payment_table pmt 
                                        JOIN users usr ON pmt.user_id = usr.id 
                                        JOIN order_table odr ON pmt.order_id = odr.id 
                                        JOIN product_table pro ON odr.product_id = pro.id 
                                       	JOIN category_table cat ON odr.category_id = cat.id 
                                        JOIN subcategory_table sub ON odr.subcategory_id = sub.id 
                                        WHERE pmt.active = 1";
                                        $rs = mysqli_query($conn,$productQry);

                                        if(mysqli_num_rows($rs) > 0) {
                                            $i = 1;
                                            while($row = mysqli_fetch_assoc($rs)) {

                                    ?>
                                    <tr class="category-<?php echo $row['id']?>">
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['first_name'] . " ". $row['last_name'] ?></td>
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td><?php echo $row['subcategory_name'] ?></td>
                                        <td><?php echo $row['amount'] ?></td>
                                        <td>
                                            <?php 
                                                if ($row['status']) {
                                            ?>
                                            <span class="badge badge-success">Success</span>
                                            <?php 
                                                } else {
                                            ?>
                                            <span class="badge badge-danger">Pending</span>
                                            <?php 
                                                }
                                            ?>
                                        </td>



                                        <td><?php echo $row['doi']?></td>
                                        <td><?php echo $row['dou']?></td>
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
                echo 'swal("Success","Category inserted successfully!","success");';
            }
            if(isset($_GET['errorinsert']))
            {
                echo 'swal("Fail","Category not inserted!","warning");';
            }
            if(isset($_GET['successupdate']))
            {
                echo 'swal("Success","Category updated successfully!","success");';
            }
            if(isset($_GET['errorupdate']))
            {
                echo 'swal("Fail","Category not updated!","warning");';
            }
            if(isset($_GET['successdelete']))
            {
                echo 'swal("Success","Category deleted successfully!","success");';
            }
        ?>
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('click','#deletepayment',function(){
                var id =$(this).data("id");
                $(document).on('click','.final-delete',function(){
                    $.ajax
                    ({
                        type:'POST',
                        url: "deletepayment.php",
                        data:{payment_id : id},
                        success: function(data){ 
                            //console.log(data); 
                            //location.relode('true');
                            //window.location.reload();
                             location.href = "viewpayment.php?successdelete=Event deleted successfully.";
                            //$('.category-'+data).remove();
                        }
                    });
                });

            }); 
        });
   </script>
    
</body>

</html>
