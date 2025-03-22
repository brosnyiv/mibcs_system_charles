<?php
    include("php/dbconnect.php");
    // include("php/checklogin.php");  // Assuming you have a login check to ensure the user is logged in

    // Fetch the student's details from the session
    $email= $_SESSION['email'];

    // Query to get student information
    $sql = "SELECT * FROM Students WHERE email = '$email'";
    $result = $conn->query($sql);

    // Check if the student exists
    if($result->num_rows == 1) {
        $student = $result->fetch_assoc();
        $student_name = $student['first_name'];  // Example: Assuming the student has a 'fname' field
    } else {
        // Redirect to login if student is not found
        header("Location: index.php");
        exit();
    }

    // Fetch other relevant data, for example, total paid, balance, etc.
    $year = date('Y');  // Example for the current year
    
/*     // Example query for total paid
    $sql_paid = "SELECT SUM(amount) AS total_amount FROM funds WHERE year = '$year' AND status = 'Verified'";
    $result_paid = $conn->query($sql_paid);
    $row_paid = $result_paid->fetch_assoc();
    $total_paid = number_format($row_paid['total_amount'] ?? 0); */

    // Example query for total balance
    /* $sql_balance = "SELECT SUM(balance) AS total_balance FROM request WHERE year = '$year' AND status = 'Completed'";
    $result_balance = $conn->query($sql_balance);
    $row_balance = $result_balance->fetch_assoc();
    $total_balance = number_format($row_balance['total_balance'] ?? 0); */

    /* // Example query for tuition fees
    $sql_tuition = "SELECT SUM(expected_amount) AS total_tuition FROM request WHERE year = '$year' AND status = 'Pending'";
    $result_tuition = $conn->query($sql_tuition);
    $row_tuition = $result_tuition->fetch_assoc();
    $total_tuition = number_format($row_tuition['total_tuition'] ?? 0); */

    /* // Example query for total course units
    $sql_courses = "SELECT COUNT(*) AS total_courses FROM request WHERE status = 'Pending'";
    $result_courses = $conn->query($sql_courses);
    $row_courses = $result_courses->fetch_assoc();
    $total_courses = number_format($row_courses['total_courses'] ?? 0); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="css/styles.css" rel="stylesheet"> <!-- Update your CSS file path -->
</head>
<body>
    <div class="container">
        <h1>Welcome to <?php echo htmlspecialchars($student_name); ?>'s Portal</h1>

        <!-- Page Data Cards -->
        <div class="row">
            <!-- Paid Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Paid (<?php echo htmlspecialchars($year); ?>)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Ugx.  <!-- Echo removed -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Balance Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Balance (<?php echo htmlspecialchars($year); ?>)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Ugx.  <!-- Echo removed -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tuition Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Tuition (<?php echo htmlspecialchars($year); ?>)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Ugx.  <!-- Echo removed -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hdd fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Units Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Course Units  (<?php echo htmlspecialchars($year); ?>) 
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                     <!-- Echo removed -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://use.fontawesome.com/releases/v5.7.1/js/all.js"></script> <!-- For icons -->
    <script src="js/scripts.js"></script> <!-- Update your JS file path -->
</body>
</html>
