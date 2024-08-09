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
                <h1 class="h3 mb-2 text-gray-800">Add Job Opening</h1>
                <p class="mb-4">Here below one form is given just fill out and click on the "submit" button for edit job opening.</p>



                <?php
                
                $opening_id="";
                if(isset($_GET['opening_id']))
                {
                  $opening_id=$_GET['opening_id'];
                }

                $qry="SELECT * FROM opening WHERE id=$opening_id";
                $rs=mysqli_query($conn,$qry);
                $row=mysqli_fetch_assoc($rs);
                ?> 

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="plant" name="jobopeningFrm"  id="jobopeningFrm" action="updatejobopening.php?opening_id=<?php echo $row['id']?>" method="post">
                             <input type="hidden"  name="txt_openingid" class="form-control" value="<?php echo $row['id']?>" required>
                            <div class="form-group">
                                <label>Job Name:</label>
                                <input type="text" class="form-control" id="jobName" name="name" value="<?php echo $row['name']?>">
                            </div>
                            <div class="form-group">
                                <label>Job Requirements:</label>
                                <textarea cols="10" rows="5" class="form-control" name="requirements" id="jobRequirements"><?php echo $row['requirements']?></textarea>
                                <p style="color:red">(Note*: Please enter "," after one line end. and then add second line.)</p>
                            </div>

                             <div class="form-group">
                                <label>Job Responsibilities:</label>
                                <textarea cols="10" rows="5" class="form-control" name="responsibilities" id="jobResponsibilities"><?php echo $row['responsibilities']?></textarea>
                                <p style="color:red">(Note*: Please enter "," after one line end. and then add second line.)</p>
                            </div>
                            <div class="form-group">
                                <label>Job Background:</label>
                                 <textarea cols="10" rows="5" class="form-control" name="background" id="jobBackground"><?php echo $row['background']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Experience:</label>
                                <input type="text" class="form-control" id="jobexperience" name="experience" value="<?php echo $row['experience']?>">
                                <p style="color:red">(Note*: Please enter "," after add one industrial background.)</p>    
                            </div>
                            <!-- <div class="form-group">
                                <label>Qualification:</label>
                                <textarea cols="10" rows="5" class="form-control" name="qualification" id="jobQualification"><?php echo $row['qualification']?></textarea>
                            </div> -->
                             <div class="form-group">
                                <label>Industry:</label>
                                <input type="text" class="form-control" id="jobIndustry" name="industry" value="<?php echo $row['industry']?>">
                            </div>
                             <div class="form-group">
                                <label>Area:</label>
                                <input type="text" class="form-control" id="jobArea" name="area" value="<?php echo $row['area']?>">
                            </div>

                            <?php
                            $languages=[];
                             $languages = explode(",",$row['languages']);
                            ?>
                            <div class="form-group">
                                <label>Languages:</label>
                                <input type="checkbox" name="language[]" value="Hindi" <?php if(in_array('Hindi', $languages)) echo " checked "?> />Hindi
                                <input type="checkbox" name="language[]" value="English" <?php if(in_array('English', $languages)) echo " checked "?> />English
                                <input type="checkbox" name="language[]" value="Gujarati" <?php if(in_array('Gujarati', $languages)) echo " checked "?> />Gujarati
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
              $("#jobopeningFrm").find("div .sw-field__error").remove();
                  $("#jobName, #jobRequirements, #jobResponsibilities, #jobBackground,#jobexperience, #jobQualification, #jobIndustry, #jobArea , #jobLanguage").each(function() {
                      if($(this).val() == '') {
                        e.preventDefault();
                        $(this).after("<div class='sw-field__error' style='color: red;'>This field is required.</div>");
                        $(this).addClass('custom-validation-error');
                      }
                      else
                      {
                         $("#jobopeningFrm").submit();
                      }
                  });
        }); 

        $(document).on('keyup', '#jobName', function () {
            var jobNameError=$(this).siblings('.sw-field__error').text();
            if(jobNameError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });

         $(document).on('keyup', '#jobRequirements', function () {
            var jobRequirementsError=$(this).siblings('.sw-field__error').text();
            if(jobRequirementsError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });

          $(document).on('keyup', '#jobResponsibilities', function () {
            var jobResponsibilitiesError=$(this).siblings('.sw-field__error').text();
            if(jobResponsibilitiesError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');
            }
        });
        $(document).on('keyup', '#jobexperience', function () {
            var jobexperienceError=$(this).siblings('.sw-field__error').text();
            if(jobexperienceError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');
            }
        });
          
        $(document).on('keyup', '#jobBackground', function () {
            var jobBackgroundError=$(this).siblings('.sw-field__error').text();
            if(jobBackgroundError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });

         $(document).on('keyup', '#jobQualification', function () {
            var jobQualificationError=$(this).siblings('.sw-field__error').text();
            if(jobQualificationError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });
          $(document).on('keyup', '#jobIndustry', function () {
            var jobIndustryError=$(this).siblings('.sw-field__error').text();
            if(jobIndustryError)
            {
                $(this).siblings('.sw-field__error').text('');
                $(this).siblings('.sw-field__error').remove();
                $(this).removeClass('custom-validation-error');

            }
        });

        $(document).on('keyup', '#jobArea', function () {
            var jobAreaError=$(this).siblings('.sw-field__error').text();
            if(jobAreaError)
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