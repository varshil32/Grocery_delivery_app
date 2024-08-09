<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./header.php');?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            require('./menu.php');
            require('./dbconnection.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require("./navbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">View Products</h1>
                <p class="mb-4">Here below list of products are displayed.you can search any product by typeing it's name into search box.as well in the last column you can edit,delete the product.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Description</th>
                                        <th>Price</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $productQry = "SELECT p.*,c.category_name as category_name,sc.subcategory_name as subcategory_name FROM product_table p LEFT JOIN category_table c ON p.category_id = c.id LEFT JOIN subcategory_table sc ON p.subcategory_id = sc.id WHERE p.active = 1";
                                        
                                        $rs = mysqli_query($conn,$productQry);

                                        if(mysqli_num_rows($rs) > 0) {
                                            $j = 1;
                                            while($row = mysqli_fetch_assoc($rs)) {

                                    ?>
                                    <tr class="product-<?php echo $row['id']?>">
                                        <td><?php echo $j++;?></td>
                                        <td><?php echo $row['product_name']?></td>
                                        <td><?php 
                                        $imgarray =[];
                                        $imgarray = explode(",",$row['product_pic']);
                                        //print_r($imgarray);
                                        for ($i=0; $i <count($imgarray) ; $i++) { ?>
                                            <img src="<?php echo $imgarray[$i]?>" width="100" height="100" alt="not found" class="img-border">
                                        <?php } ?>
                                            
                                        </td>
                                        <td><?php echo $row['product_description']?></td>
                                        <td><?php echo $row['product_price']?></td>
                                        <td><?php echo $row['category_name']?></td>
                                        <td><?php echo $row['subcategory_name']?></td>
                                        <td><?php echo $row['doi']?></td>
                                        <td><?php echo $row['dou']?></td>
                                        <td>
                                            <a href="editproduct.php?product_id=<?php echo $row['id']?>" class="btn btn-info btn-circle btn-sm">
                                                <span class="material-symbols-outlined">edit</span>
                                            </a>
                                            <a href="" class="btn btn-danger btn-circle btn-sm" id="deleteproduct" data-id="<?php echo $row['id']?>" data-toggle="modal" data-target="#deleteModal">
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

    <?php require("./footer.php");?>
   <script  type="text/javascript">
        <?php
            if(isset($_GET['successinsert']))
            {
                echo 'swal("Success","Product inserted successfully!","success");';
            }
            if(isset($_GET['errorinsert']))
            {
                echo 'swal("Fail","Product not inserted!","warning");';
            }
            if(isset($_GET['errorfileinsert']))
            {
                echo "swal('Fail','There is some problem in product image inserting please try again','warning');";
            }
            if(isset($_GET['errorbrochureinsert']))
            {
                echo "swal('Fail','There is some problem in brochure inserting please try again','warning');";
            }
            if(isset($_GET['successupdate']))
            {
                echo 'swal("Success","Product updated successfully!","success");';
            }
            if(isset($_GET['errorupdate']))
            {
                echo 'swal("Fail","Product not updated!","warning");';
            }
            if(isset($_GET['successdelete']))
            {
                echo 'swal("Success","Product deleted successfully!","success");';
            }
        ?>
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('click','#deleteproduct',function(){
                var product_id =$(this).data("id");
                $(document).on('click','.final-delete',function(){
                    $.ajax
                    ({
                        type:'POST',
                        url: "deleteproduct.php",
                        data:{product_id : product_id},
                        success: function(data){ 
                            //console.log(data); 
                            //location.relode('true');
                            //window.location.reload();
                            location.href = "viewproducts.php?successdelete=Product deleted successfully.";
                            //$('.plant-'+data).remove();
                        }
                    });
                });

            }); 
        });
   </script>
</body>

</html>