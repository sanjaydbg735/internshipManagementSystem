<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login2($con);

    if (isset($_GET["sid"])) {
        $sid = $_GET["sid"];
        $query = "UPDATE student SET resume_verified=1 WHERE sid={$sid}";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "Resume marked as verified for student: {$sid}";
        }
        else {
            echo "Failed to mark the resume as verified!";
        }
    }

    header("Refresh:2;url=./admin_query.php");
    die;
?>