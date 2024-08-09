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
                <h1 class="h3 mb-2 text-gray-800">View Events</h1>
                <p class="mb-4">Here below list of events are displayed.you can search any plant by typeing it's name into search box.as well in the last column you can edit,delete the event.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Plants</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>Event Description</th>
                                        <th>Event Pic</th>
                                        <th>Created Date</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $productQry = "SELECT * FROM events WHERE active = 1";
                                        $rs = mysqli_query($conn,$productQry);

                                        if(mysqli_num_rows($rs) > 0) {
                                            $j = 1;
                                            while($row = mysqli_fetch_assoc($rs)) {

                                    ?>
                                    <tr class="event-<?php echo $row['id']?>">
                                        <td><?php echo $j++;?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td>
                                              <?php 
                                        $imgarray =[];
                                        $imgarray = explode(",",$row['pic']);
                                        //print_r($imgarray);
                                        for ($i=0; $i <count($imgarray) ; $i++) { ?>
                                            <img src="<?php echo $imgarray[$i]?>" width="100" height="100" alt="not found" class="img-border">
                                        <?php } ?>
                                        </td>
                                        <td><?php echo $row['created_at']?></td>
                                        <td>
                                            <a href="editevent.php?event_id=<?php echo $row['id']?>" class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-circle btn-sm" id="deleteevent" data-id="<?php echo $row['id']?>" data-toggle="modal" data-target="#deleteModal">
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
            if(isset($_GET['successinsert']))
            {
                echo 'swal("Success","Event inserted successfully!","success");';
            }
            if(isset($_GET['errorinsert']))
            {
                echo 'swal("Fail","Event not inserted!","warning");';
            }
            if(isset($_GET['errorfileinsert']))
            {
                echo "swal('Fail','There is some problem in event images inserting please try again','warning');";
            }
            if(isset($_GET['successupdate']))
            {
                echo 'swal("Success","Event updated successfully!","success");';
            }
            if(isset($_GET['errorupdate']))
            {
                echo 'swal("Fail","Event not updated!","warning");';
            }
            if(isset($_GET['successdelete']))
            {
                echo 'swal("Success","Event deleted successfully!","success");';
            }
        ?>
    </script>
   <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('click','#deleteevent',function(){
                var id =$(this).data("id");
                $(document).on('click','.final-delete',function(){
                    $.ajax
                    ({
                        type:'POST',
                        url: "deleteevent.php",
                        data:{event_id : id},
                        success: function(data){ 
                            //console.log(data); 
                            //location.relode('true');
                           // window.location.reload();
                           location.href = "viewevents.php?successdelete=Event deleted successfully.";
                            //$('.event-'+data).remove();
                        }
                    });
                });

            }); 
        });
   </script>
</body>

</html>