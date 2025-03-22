<?php
// Include the database connection
include("php/dbconnect.php");

// Start session at the very beginning

$invalidLoginError = '';
$pendingAccountError = '';

// Check if the form is submitted
if (isset($_POST['login'])) {
    // Sanitize input to avoid XSS and trim spaces
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password_hash = mysqli_real_escape_string($conn, $_POST['password_hash']);

    // Validate if the fields are not empty
    if ($email == '' || $password_hash == '') {
        $invalidLoginError = '<div class="error">All fields are required</div>';
    } else {
        // Use a direct SQL query (without prepared statements)
        $sql = "SELECT * FROM Students WHERE email = '$email' AND password_hash = '$password_hash'";
        $result = mysqli_query($conn, $sql);

        // Check if a row is returned
        if (mysqli_num_rows($result) > 0) {
            // Start session and redirect to dashboard
            $_SESSION['email'] = $email;
            // Redirect to dashboard or appropriate page
            header("Location:hello.php");
            exit();
        } else {
            // Show error if login is invalid
            $invalidLoginError = '<div class="error">Invalid student ID or password</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="login/loginstyle.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</head>
<body>
    <div class="login">
        <h1>MIBCS Login</h1>
        <form method="post">
            <label for="email">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" class="form-control" placeholder="XXXXX-XXXXXXX-X" name="email" required>
            <script>
                $(":input").inputmask();
            </script>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password_hash" placeholder="Password" id="password" required>
            <?php echo $invalidLoginError; ?>
            <?php echo $pendingAccountError; ?>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
