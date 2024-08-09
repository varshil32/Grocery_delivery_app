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
                                        <h1 class="h4 text-white-900 mb-4 header-style">Forgot Password</h1>
                                    </div>
                                    <form class="user" action="forgotpwdprocess.php" method="post" name="forgotpwdfrm">
                                        <div class="form-group">
                                            <lable class="prompt-font-color">Email:<lable>
                                            <input type="email" class="form-control form-control-user radius-user"
                                                id="inputEmail" aria-describedby="emailHelp"
                                                name="email" autofocus="true">
                                        </div>
                                        <hr>
                                        <input type="submit" class="btn btn-user btn-block font-weight-bold btn-color" value="Submit" name="submit"/>
                                    </form>
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