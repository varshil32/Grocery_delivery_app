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
                <h1 class="h3 mb-2 text-gray-800">View Order</h1>
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
                                        <th>User name</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Product Description</th>
                                        <th>Product Price</th>
                                        <th>Date of Insertion</th>
                                        <th>Date of Updation</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $productQry = "SELECT odr.*,usr.first_name, usr.last_name, cat.category_name, sub.subcategory_name, pro.product_name, pro.product_price, pro.product_description FROM order_table odr 
                                        JOIN users usr ON odr.user_id = usr.id 
                                       	JOIN product_table pro ON odr.product_id = pro.id 
                                       	JOIN category_table cat ON odr.category_id = cat.id 
                                        JOIN subcategory_table sub ON odr.subcategory_id = sub.id 
                                        WHERE odr.active = 1";
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
                                        <td><?php echo $row['product_description'] ?></td>
                                        <td><?php echo $row['product_price'] ?></td>
                                        <td><?php echo $row['doi']?></td>
                                        <td><?php echo $row['dou']?></td>
                                        <td>
                                            <!-- <a href="editcategory.php?category_id=<?php echo $row['id']?>" class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a> -->
                                            <a href="deleteorder.php" class="btn btn-danger btn-circle btn-sm" id="deleteorder" data-id="<?php echo $row['id']?>" data-toggle="modal" data-target="#deleteModal">
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
                echo 'swal("Success","Order inserted successfully!","success");';
            }
            if(isset($_GET['errorinsert']))
            {
                echo 'swal("Fail","Order not inserted!","warning");';
            }
            if(isset($_GET['successupdate']))
            {
                echo 'swal("Success","Order updated successfully!","success");';
            }
            if(isset($_GET['errorupdate']))
            {
                echo 'swal("Fail","Order not updated!","warning");';
            }
            if(isset($_GET['successdelete']))
            {
                echo 'swal("Success","Order deleted successfully!","success");';
            }
        ?>
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('click','#deleteorder',function(){
                var id =$(this).data("id");
                $(document).on('click','.final-delete',function(){
                    $.ajax
                    ({
                        type:'POST',
                        url: "deleteorder.php",
                        data:{order_id : id},
                        success: function(data){ 
                            //location.relode('true');
                            //window.location.reload();
                            location.href = "vieworder.php?successdelete=Order deleted successfully.";
                            //$('.category-'+data).remove();
                        }
                    });
                });

            }); 
        });
   </script>
    
</body>

</html>
