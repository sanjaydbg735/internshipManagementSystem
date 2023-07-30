<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login2($con);

    if (isset($_GET["sid"])) {
        $sid = $_GET["sid"];
        $target_directory = "../ims-documents/";
        $target_filename = "resume-{$sid}.pdf";
        $target_filepath = "$target_directory/$target_filename";

        if (file_exists($target_filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: filename='.basename($target_filepath));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($target_filepath));
            ob_clean();
            flush();
            readfile($target_filepath);
            exit;
        }
    }
?>