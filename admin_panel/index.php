<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./header.php');

    session_start();

    if ($_SESSION && $_SESSION['userId']) {
        header("location:viewcategories.php");
        exit;
    }
    ?>
</head>
<style>
    @media only screen and (max-width: 600px) {
      .mobile-width-view {
        flex: 0 0 100% !important;
        max-width: 100% !important;
      }
    }
</style>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 xl-10-mod mobile-width-view">

                <div class="card o-hidden border-0 shadow-lg my-5 card-custom">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 lg-12-mod">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white-900 mb-4 header-style">Login</h1>
                                    </div>
                                    <form class="user" action="loginprocess.php" method="post" name="loginfrm">
                                        <div class="form-group">
                                            <lable class="prompt-font-color">Email:<lable>
                                            <input type="email" class="form-control form-control-user radius-user"
                                                id="inputEmail" aria-describedby="emailHelp"
                                                name="email" autofocus="true">
                                        </div>
                                        <div class="form-group">
                                        <lable class="prompt-font-color">Password:<lable>
                                            <input type="password" class="form-control form-control-user"
                                                id="inputPassword" name="password">
                                        </div>
                                        <hr>
                                        <input type="submit" class="btn btn-user btn-block font-weight-bold btn-color" value="Login" name="submit"/>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-decoration-none text-white" href="forgotpassword.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-decoration-none text-white" href="./signup.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php require('./footer.php');?>
    <?php $message =  $_GET &&  $_GET['password'] ? $_GET['password'] : ""; 
    ?>
    <script type="text/javascript">
        var geturl = window.location.href;
        var url = new URL(geturl);
        var password = url.searchParams.get("password");
        <?php 
            if (isset($_GET['password'])) {
                echo 'swal("Success","Your Password is fetched successfully: "+ password,"success");';
            }  
        ?>
    </script>
</body>

</html>