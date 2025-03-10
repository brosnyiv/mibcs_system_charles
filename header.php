<?php 
include("dbconnect.php");
include("php/checklogin.php");
$month=date("M");
$year=date("Y");
$num=30;
$user_id = $_SESSION['rainbow_uid'];
$sql = "SELECT * FROM Students where student_id =$user_id";
// Execute the query
$result = mysqli_query($conn, $sql);
// Loop through the rows and output the data
while ($row = mysqli_fetch_assoc($result)) {
    // Output the data for each row
$student_id = $row["student_id"];
$sur_name = $row["sur_name"];
$first_name = $row["first_name"];
$middle_name = $row["middle_name"];
$dob = $row["dob"];
$gender = $row["gender"];
$profile_photo = $row["profile_photo"];
$village = $row["village"];
$city = $row["city"];
$phone_number = $row["phone_number"];
$email = $row["email"];
$session_study = $row["session_study"];

$parent_name = $row["parent_name"];
$parent_phone = $row["parent_phone"];
$parent_email = $row["parent_email"];
$secondary_contact_name = $row["secondary_contact_name"];
$secondary_contact_phone = $row["secondary_contact_phone"];
$secondary_contact_email = $row["secondary_contact_email"];
$admission_number = $row["admission_number"];
$password_hash = $row["password_hash"];
$status_ = $row["status_"];


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>MIBCS | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MIBCS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Welcome Page</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MIBCS Portal
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tv"></i>
                    <span>Course Enrolled</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Course Enrolled:</h6>
                        <a class="collapse-item" href="lap-intro.php">Course Intro</a>
                        <a class="collapse-item" href="lap-budget.php">Timetable/Schedule</a>
                        <a class="collapse-item" href="lap-tors.php">lecturers</a>
                    
                    </div>
                </div>
            </li>
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Assigment/coursework:</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Assigment/coursework:</h6>
                        
                        <a class="collapse-item" href="infra-budget.php">Ongoing Assignment</a>
                        <a class="collapse-item" href="infra-tors.php">completed assignments</a>
                        <a class="collapse-item" href="infra-request.php">Upload Assignments</a>
                    </div>
                </div>
            </li>
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-ambulance"></i>
                    <span>Academic Progress</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Academic Progress:</h6>
                        <a class="collapse-item" href="emergency-budget.php">Recent grades</a>
                        <a class="collapse-item" href="emergency-tors.php"> GPA summary </a>
                        <a class="collapse-item" href="emergency-request.php">Submit compliant</a>
                    </div>
                </div>

            <li class="nav-item">
                <a class="nav-link" href="tracking.php">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>Track Attendence</span></a>
            </li>

            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Other Details
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
          
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="monthly-fund.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Monthly Details</span></a>
            </li>
          <li class="nav-item">
                <a class="nav-link" href="add-funds.php">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Add Your Funds</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="track-funds.php">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>Track Funds</span></a>
            </li>
                        <hr class="sidebar-divider">
        </ul>
                <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name;?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="add-funds.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>