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
                <h1 class="h3 mb-2 text-gray-800">Edit Brand</h1>
                <p class="mb-4">Here below one form is given just fill out and click on the "submit" button for edit brand.</p>

                <?php
                
                $brand_id="";
                if(isset($_GET['brand_id']))
                {
                  $brand_id=$_GET['brand_id'];
                }

                $qry="SELECT * FROM brands WHERE id=$brand_id";
                $rs=mysqli_query($conn,$qry);
                $row=mysqli_fetch_assoc($rs);
                ?>  

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="brand" name="brandFrm" id="brandFrm" action="updatebrand.php?brand_id=<?php echo $row['id']?>" enctype="multipart/form-data" method="post">
                            <input type="hidden"  name="txt_brandid" class="form-control" value="<?php echo $row['id']?>" required>
                            <div class="form-group">
                                <label>Brand Name:</label>
                                <input type="text" class="form-control" id="brandName" name="name" value="<?php echo $row['name']?>">
                            </div>

                            <div class="form-group">
                                <label>Brand Description:</label>
                                <textarea cols="10" rows="5" class="form-control" name="description" id="brandDescription"><?php echo $row['description']?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Brand Pic:</label>
                                <input type="file" name="fileToUploadBrand[]" class="form-control" id="brandImage" multiple accept="image/png,image/gif, image/jpeg, image/jpg"/>
                                <p style="color:red">(Note*: only jpg,png extension are allowed, and file size should be in beetween 10KB to 500KB)</p>
                            </div>
                            <div class="form-group">
                                <!-- <img src="<?php //echo $row['pic']?>" width="100" height="100" alt="not found"> -->
                                <?php 
                                        $imgarray =[];
                                        $imgarray = explode(",",$row['pic']);
                                        //print_r($imgarray);
                                        for ($i=0; $i <count($imgarray) ; $i++) { ?>
                                            <img src="<?php echo $imgarray[$i]?>" width="100" height="100" alt="not found" class="img-border">
                                        <?php } ?>
                            </div>

                            <input type="submit" class="btn btn-color btn-md" value="submit" name="submit"  id="submit"/>
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
            
              $("#brandFrm").find("div .sw-field__error").remove();
              $("#brandName, #brandDescription").each(function() {
                  if($(this).val() == '') {
                    e.preventDefault();
                     $(this).after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
                    $(this).addClass('custom-validation-error');
                  }
                  else
                  {
                     $("#brandFrm").submit();
                  }
              });

        }); 

        $(document).on('keyup', '#brandName', function () {
            var nameError=$(this).siblings('.sw-field__error').text();
            if(nameError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });
        $(document).on('keyup', '#brandDescription', function () {
            var descriptionError=$(this).siblings('.sw-field__error').text();
            if(descriptionError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });
        // $(document).on('click', '#brandImage', function () {
        //     var imageError=$(this).siblings('.sw-field__error').text();
        //     if(imageError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

    });
       
   </script>
</body>

</html>