<?php
    include("php/dbconnect.php");

    session_start();

    // Check if session variable 'student_id' is set
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        // Using SQL query to get the student details
        $sql = "SELECT * FROM Students WHERE email = '$email'";
        $q = $conn->query($sql);
        
        // If no student found with the given student_id, redirect to login
        if($q->num_rows != 1) {
            header("Location: index.php");
            exit();
        }
    }
    else {
        // If session variable 'student_id' is not set, redirect to login page
        header("Location: dashboard.php");
        exit();
    }
?>
