<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./header.php');?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 xl-10-mod xl-width">

                <div class="card o-hidden border-0 shadow-lg my-5 card-custom">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 lg-12-mod">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white-900 mb-4 header-style">Sign Up</h1>
                                    </div>
                                    <form class="user" action="signupprocess.php" method="post" name="signupfrm">
                                        <div class="form-group">
                                            <lable class="prompt-font-color">Full Name:<lable>
                                            <input type="text" class="form-control form-control-user"
                                                id="inputFullName"
                                                name="fullName" autofocus="true">
                                        </div>
                                        <div class="form-group">
                                            <lable class="prompt-font-color">Email:<lable>
                                            <input type="email" class="form-control form-control-user"
                                                id="inputEmail" name="email">
                                        </div>
                                        <div class="form-group">
                                        <lable class="prompt-font-color">Password:<lable>
                                            <input type="password" class="form-control form-control-user"
                                                id="inputPassword" name="password">
                                        </div>
                                        <div class="form-group">
                                            <lable class="prompt-font-color">Confirm Password:<lable>
                                            <input type="password" class="form-control form-control-user"
                                                id="inputCPassword" name="confirmpassword">
                                        </div>
                                        <hr>
                                        <input type="submit" class="btn btn-user btn-block font-weight-bold btn-color" value="Register" name="register"/>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-decoration-none text-white" href="index.php">Already have an account! click here for login</a>
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

</body>

</html>