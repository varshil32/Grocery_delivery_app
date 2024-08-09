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
                <h1 class="h3 mb-2 text-gray-800">Add Product</h1>
                <p class="mb-4">Here below one form is given just fill out and click on the "submit" button for add category.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="product" name="productFrm" id="productFrm" enctype="multipart/form-data" action="addproductprocess.php" method="POST">
                       
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Product Name:</label>
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                </div>                               

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Product Price:</label>
                                        <input type="text" name="price" class="form-control" id="price">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description:</label>
                                        <textarea name="description" cols="20" rows="5" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                            <select class="form-control" name="category_id" id="category"> <option value="">Select category</option>
                                                <?php
                                                $qry1="SELECT * FROM `category_table` WHERE active=1";
                                                $rs1=mysqli_query($conn,$qry1);
                                                if(mysqli_num_rows($rs1)>0)
                                                {
                                                while($row=mysqli_fetch_assoc($rs1))
                                                {
                                                ?>
                                                    <option value=<?php echo $row['id']?>><?php echo $row['category_name']?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subcategory Name:</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                
                                            <select class="form-control" name="subcategory_id" id="subcategory">
                                                    <option value="" selected>Select Subcategory</option>
                                            </select>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                         
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Image:</label>
                                            <input type="file" name="fileToUploadProduct[]" id="fileToUploadProduct" class="form-control" multiple>
                                            <p style="color:red">(Note*: only jpg,png extension are allowed, and file size should be in beetween 10KB to 100MB)</p>
                                        </div>
                                    </div>
                            </div>
        
                            <input type="submit" class="btn btn-primary btn-md" value="submit" name="submit" id="submit"/>
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
  
   
   <?php require("./footer.php");?>
   <script type="text/javascript">
        $("document").ready(function function_name(argument) {
        // body...
    
        $("#category").on("change",function function_name(argument) {
            // body...
           //alert("hii");
            var cid=$(this).val();
           // alert(cid);
            if(cid)
            {
            $.ajax({
                type:'POST',
                url:'selectsubcategory.php',
                data:'category_id='+cid,
                success:function(r){
              //  alert(r);
                $("#subcategory").html(r);
                }
            }); 
            }
            
        });
        })
    </script>
      <script type="text/javascript">
    $( document ).ready(function() {

        //check condition
        $(document).on('click','#submit',function(e){
            
                $("#productFrm").find("div .sw-field__error").remove();
                    $("#name").each(function() {
                     if($(this).val() == '') {
                        e.preventDefault();
                        $(this).after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
                        $(this).addClass('custom-validation-error');
                      }
                      else
                      {
                         $("#productFrm").submit();
                      }
                  });
                 $("#subcategory,#category").each(function(){
                    if($(this).val() == '') {
                        e.preventDefault();
                        $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
                        $(this).addClass('custom-validation-error');
                    } else {
                        $("#productFrm").submit();
                    }
                });
            //   $("#name, #description,#seriesname,#modelno,#ledpower,#powersource,#inputvoltage,#highvoltageprotection,#ovpprotection,#lvpprotection,#otcprotection,#surgeprotection,#powerfactor,#cri,#iprate,#luminousflux,#ledtype,#lightingcolor,#glasstype,#material,#size,#warranty,#waterproof,#fileToUploadProduct,#fileToUploadBrochure").each(function() {
            //       if($(this).val() == '') {
            //         e.preventDefault();
            //         $(this).after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
            //         $(this).addClass('custom-validation-error');
            //       }
            //       else
            //       {
            //          $("#productFrm").submit();
            //       }
            //   });
            //   $("#efficiency,#thdi,#frequency,#beamangle,#castingweight,#noofled,#weight,#netweight,#qtycartoon,#ratedlifetime,#subcategory,#category").each(function(){
            //     if($(this).val() == '') {
            //         e.preventDefault();
            //         $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
            //         $(this).addClass('custom-validation-error');
            //     } else {
            //         $("#productFrm").submit();
            //     }
            //   });
            
            
        }); 

        $(document).on('keyup', '#name', function () {
            var nameError=$(this).siblings('.sw-field__error').text();
            if(nameError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });
        // $(document).on('keyup', '#description', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#seriesname', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#modelno', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#ledpower', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#powersource', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#inputvoltage', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#highvoltageprotection', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //   $(document).on('keyup', '#ovpprotection', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#lvpprotection', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#otcprotection', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        // $(document).on('keyup', '#surgeprotection', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        // $(document).on('keyup', '#powerfactor', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#efficiency', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#cri', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        // $(document).on('keyup', '#thdi', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#frequency', function () {
        //     var descriptionError=$(this).parent().siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
          

        // $(document).on('keyup', '#beamangle', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#castingweight', function () {
        //     var descriptionError=$(this).parent().siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#iprate', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#luminousflux', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#noofled', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#ledtype', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#lightingcolor', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#glasstype', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //   $(document).on('keyup', '#material', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#size', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#weight', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#netweight', function () {
        //     var descriptionError=$(this).parent().siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        //  $(document).on('keyup', '#qtycartoon', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('keyup', '#warranty', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });

        // $(document).on('keyup', '#ratedlifetime', function () {
        //     var nameError=$(this).parent().siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).parent().siblings('.sw-field__error').text('');
        //         $(this).parent().siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('change', '#waterproof', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });


        $(document).on('change', '#category', function () {
            var nameError=$(this).parent().siblings('.sw-field__error').text();
            if(nameError)
            {
                $(this).parent().siblings('.sw-field__error').text('');
                $(this).parent().siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });
        $(document).on('change', '#subcategory', function () {
            var descriptionError=$(this).parent().siblings('.sw-field__error').text();
            if(descriptionError)
            {
                $(this).parent().siblings('.sw-field__error').text('');
                $(this).parent().siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });

        //  $(document).on('click', '#fileToUploadProduct', function () {
        //     var nameError=$(this).siblings('.sw-field__error').text();
        //     if(nameError)
        //     {
        //         $(this).siblings('.sw-field__error').text('');
        //         $(this).siblings('.sw-field__error').remove();
        //         $(this).removeClass('custom-validation-error');

        //     }
        // });
        // $(document).on('click', '#fileToUploadBrochure', function () {
        //     var descriptionError=$(this).siblings('.sw-field__error').text();
        //     if(descriptionError)
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
        %