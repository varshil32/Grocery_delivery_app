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
                <h1 class="h3 mb-2 text-gray-800">Edit Subcategory</h1>
                <p class="mb-4">Here below one form is given just fill out and click on the "submit" button for edit sub category.</p>

                <?php
	            // var_dump($_GET);
	            $subcategory_id="";
	            if(isset($_GET['subcategory_id']))
	            {
	              $subcategory_id=$_GET['subcategory_id'];
	            }
	            // echo $subcategory_id;

	            $qry="SELECT * FROM subcategory_table WHERE id=$subcategory_id";
	            $rs=mysqli_query($conn,$qry);
	            $row=mysqli_fetch_assoc($rs);
	            ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="subcategory" name="subcategoryFrm" id="subcategoryFrm" action="updatesubcategory.php?subcategory_id=<?php echo $row['id']?>" method="post">
                        	 <input type="hidden"  name="txt_subcatid" class="form-control" value="<?php echo $row['id']?>" required>
                            <div class="form-group">
                                <label>Select Category Name:</label>
                                <select name="categoryId" id="categoryId" class="form-control form-control-category">
                                    <option value=''>Select Category</option>
                                    <?php 
                                        $productQry1 = "SELECT * FROM category_table WHERE active = 1";
                                        $rs1 = mysqli_query($conn,$productQry1);

                                        if(mysqli_num_rows($rs1) > 0) {
                                            $i = 1;
                                            while($row1 = mysqli_fetch_assoc($rs1)) {

                                    ?>
                                    <option value="<?php echo $row1['id']?>"
                                    	<?php
					                      if($row['category_id']===$row1['id'])
					                      {
					                        echo "selected";
					                      }
					                      ?>
					                      >
					                      <?php echo $row1['category_name']?>
					                        
					                 </option>

					                      <?php
					                          }
					                        }
					                      ?>
                                    
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Sub Category Name:</label>
                                <input type="text" class="form-control form-control-sub-category"
                                    id="subcategoryName" name="subcategory"  value="<?php echo $row['subcategory_name']?>" required>
                    <!-- <p class="help-block">Successfully done</p> -->
                            </div>
                            <input type="submit" class="btn btn-color btn-md" value="submit" name="submit" id="submit" />
                            <input type="reset" class="btn btn-danger btn-md" value="cancel" name="cancel"/>
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
   <script type="text/javascript">
    $( document ).ready(function() {

        //check condition
        $(document).on('click','#submit',function(e){
            
              $("#subcategoryFrm").find("div .sw-field__error").remove();
              $("#categoryId, #subcategoryName").each(function() {
                  if($(this).val() == '') {
                    e.preventDefault();
                     $(this).after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
                    $(this).addClass('custom-validation-error');
                  }
                  else
                  {
                     $("#subcategoryFrm").submit();
                  }
              });

        }); 

        $(document).on('change', '#categoryId', function () {
            var categoryError=$(this).siblings('.sw-field__error').text();
            if(categoryError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });


        $(document).on('keyup', '#subcategoryName', function () {
            var subcategorynameError=$(this).siblings('.sw-field__error').text();
            if(subcategorynameError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });

    });
       
   </script>

</body>

</html>