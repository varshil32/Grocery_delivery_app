<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php">
        <div class="sidebar-brand-icon rotate-n-15 pt-5 ">
            <img src="image/femiecare_logo.png" width="200" height="70" class="logo" />
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
                Interface
            </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.php">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->

    <!-- Nav Item - Utilities Collapse Menu -->


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Users:</h6>
                <a class="collapse-item" href="./viewusers.php">View Users</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Categories:</h6>
                <a class="collapse-item" href="./addcategory.php">Add Category</a>
                <a class="collapse-item" href="./viewcategories.php">View Category</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubCategories" aria-expanded="true" aria-controls="collapseSubCategories">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Sub Categories</span>
        </a>
        <div id="collapseSubCategories" class="collapse" aria-labelledby="headingSubCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Sub Categories:</h6>
                <a class="collapse-item" href="./addsubcategory.php">Add Sub Category</a>
                <a class="collapse-item" href="./viewsubcategories.php">View Sub Category</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseOrder">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingSubCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Orders:</h6>
                <a class="collapse-item" href="./vieworder.php">View Order</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayments" aria-expanded="true" aria-controls="collapsePayments">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Payments</span>
        </a>
        <div id="collapsePayments" class="collapse" aria-labelledby="headingSubCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Payments:</h6>
                <a class="collapse-item" href="./viewpayment.php">View Payments</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingSubCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Products:</h6>
                <a class="collapse-item" href="./addproduct.php">Add Product</a>
                <a class="collapse-item" href="./viewproducts.php">View Products</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedback" aria-expanded="true" aria-controls="collapseFeedback">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Feedback</span>
        </a>
        <div id="collapseFeedback" class="collapse" aria-labelledby="headingSubCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Feedback:</h6>
                <a class="collapse-item" href="./viewfeedback.php">View Feedback</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">




    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComplaint" aria-expanded="true" aria-controls="collapseComplaint">
            <i class="fas fa-fw fa-envelope-open"></i>
            <span>Complaint</span>
        </a>
        <div id="collapseComplaint" class="collapse" aria-labelledby="headingSubCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Complaint:</h6>
                <a class="collapse-item" href="./viewcomplaint.php">View Complaint</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlants"
                    aria-expanded="true" aria-controls="collapsePlants">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Plants</span>
                </a>
                <div id="collapsePlants" class="collapse" aria-labelledby="headingPlants"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Plants:</h6>
                        <a class="collapse-item" href="./addplant.php">Add Plant</a>
                        <a class="collapse-item" href="./viewplants.php">View Plants</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider"> 


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
                    aria-expanded="true" aria-controls="collapseEvents">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Events</span>
                </a>
                <div id="collapseEvents" class="collapse" aria-labelledby="headingEvents"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Events:</h6>
                        <a class="collapse-item" href="./addevent.php">Add Event</a>
                        <a class="collapse-item" href="./viewevents.php">View Events</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOpening"
                    aria-expanded="true" aria-controls="collapseOpening">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Job Opening</span>
                </a>
                <div id="collapseOpening" class="collapse" aria-labelledby="headingOpening"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Job Opening:</h6>
                        <a class="collapse-item" href="./addjobopening.php">Add Job Opening</a>
                        <a class="collapse-item" href="./viewjobopening.php">View Job Opening</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApplicants"
                    aria-expanded="true" aria-controls="collapseApplicants">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Applicants</span>
                </a>
                <div id="collapseApplicants" class="collapse" aria-labelledby="headingApplicants"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Applicants:</h6>
                        <a class="collapse-item" href="./viewapplicants.php">View Applicants</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInquiry"
                    aria-expanded="true" aria-controls="collapseInquiry">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Inquiries</span>
                </a>
                <div id="collapseInquiry" class="collapse" aria-labelledby="headingInquiry"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Inquiry:</h6>
                        <a class="collapse-item" href="./viewinquiry.php">View Inquiries</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
                    aria-expanded="true" aria-controls="collapseBrands">
                    <i class="fas fa-fw fa-sitemap"></i>
                    <span>Brands</span>
                </a>
                <div id="collapseBrands" class="collapse" aria-labelledby="headingBrands"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Brands:</h6>
                        <a class="collapse-item" href="./addbrand.php">Add Brands</a>
                        <a class="collapse-item" href="./viewbrands.php">View Brands</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAchievements"
                    aria-expanded="true" aria-controls="collapseAchievements">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Achievements</span>
                </a>
                <div id="collapseAchievements" class="collapse" aria-labelledby="headingAchievements"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Achievements:</h6>
                        <a class="collapse-item" href="./addachievement.php">Add Achievements</a>
                        <a class="collapse-item" href="./viewachievements.php">View Achievements</a>
                    </div>
                </div>
            </li> <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvestors"
                    aria-expanded="true" aria-controls="collapseInvestors">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Investors</span>
                </a>
                <div id="collapseInvestors" class="collapse" aria-labelledby="headingInvestors"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Investors:</h6>
                        <a class="collapse-item" href="./viewinvestors.php">View Investors</a>
                    </div>
                </div>
            </li> 
            
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCatelogue"
                    aria-expanded="true" aria-controls="collapseCatelogue">
                    <i class="fas fa-fw fa-shopping-basket"></i>
                    <span>Catelogue</span>
                </a>
                <div id="collapseCatelogue" class="collapse" aria-labelledby="headingSubCategories"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Catelogue:</h6>
                        <a class="collapse-item" href="./addcatelogue.php">Add Catelogue</a>
                        <a class="collapse-item" href="./viewcatelogue.php">View Catelogue</a>
                    </div>
                </div>
            </li> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
                Addons
            </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

    <!-- Nav Item - Tables -->

    <!-- Nav Item - Tables -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->
</ul>