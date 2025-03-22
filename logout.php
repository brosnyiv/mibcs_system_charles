<?php

ob_start();
session_start();
unset($_SESSION['student_id']);
echo '<script type="text/javascript">window.location="login.php"; </script>';


?>