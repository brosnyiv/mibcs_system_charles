<?php 
include("dbconnect.php");
include("checklogin.php");

$month = date("M");
$year = date("Y");
$num = 30;
$user_id = $_SESSION['student_id'];

// Ensure that user_id is an integer to avoid SQL injection
$user_id = intval($user_id);

// Direct SQL query instead of prepared statements
$sql = "SELECT * FROM Students WHERE student_id = $user_id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Loop through the rows and output the data
    while ($row = mysqli_fetch_assoc($result)) {
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
} else {
    echo "Error: " . mysqli_error($conn);
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
        <!-- Sidebar code here... -->
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content code here... -->
    </div>

</body>
</html>
