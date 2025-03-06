<?php
include("php/dbconnect.php");

$invalidLoginError = '';
$pendingAccountError = '';

if (isset($_POST['login'])) {
    $student_id = mysqli_real_escape_string($conn, trim($_POST['student_id']));
    $password_hash = mysqli_real_escape_string($conn, $_POST['password_hash']);

    if ($student_id == '' || $password_hash == '') {
        $invalidLoginError = '<div class="error">All fields are required</div>';
    } else {
        $sql = "SELECT * FROM Students WHERE student_id='" . $student_id . "' AND password_hash='" . $password_hash . "'";
        $q = $conn->query($sql);
        
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
            <label for="student_id">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" class="form-control" placeholder="XXXXX-XXXXXXX-X" name="student_id" required>
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
