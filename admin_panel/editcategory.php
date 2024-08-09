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
                <h1 class="h3 mb-2 text-gray-800">Edit Category</h1>
                <p class="mb-4">Here below one form is given just fill out and click on the "submit" button for edit category.</p>



                <?php
                
                $category_id="";
                if(isset($_GET['category_id']))
                {
                  $category_id=$_GET['category_id'];
                }

                $qry="SELECT * FROM category_table WHERE id=$category_id";
                $rs=mysqli_query($conn,$qry);
                $row=mysqli_fetch_assoc($rs);
                ?>  

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="category" name="categoryFrm" id="categoryFrm" action="updatecategory.php?category_id=<?php echo $row['id']?>" method="post">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>">
                            <div class="form-group">
                                <label>Category Name:</label>
                                <input type="text" class="form-control"
                                    id="categoryName" name="category" value="<?php echo $row['category_name']?>">
                            </div>
                            <input type="submit" class="btn btn-color btn-md" value="submit" name="submit" id="submit"/>
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
            
              $("#categoryFrm").find("div .sw-field__error").remove();
              $("#categoryName").each(function() {
                  if($(this).val() == '') {
                    e.preventDefault();
                     $(this).after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
                     $(this).addClass('custom-validation-error');
                  }
                  else
                  {
                     $("#categoryFrm").submit();
                  }
              });

        }); 

        $(document).on('keyup', '#categoryName', function () {
            var nameError=$(this).siblings('.sw-field__error').text();
            if(nameError)
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