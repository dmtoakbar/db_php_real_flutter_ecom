<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$email = trim($_POST['email']);
$otp = trim($_POST['otp']);
$is_otp_verified = trim($_POST['verified']);

$findexist = "SELECT * from users where email='$email'";
$resultsearch = mysqli_query($conn, $findexist);
if (mysqli_num_rows($resultsearch) > 0) {
    
    $query="UPDATE users SET otp='$otp', is_otp_verified='$is_otp_verified' WHERE email='$email'";

    if (mysqli_query($conn, $query)) {
        $result["status"] = 1;
        $result["message"] = "Email verified successfully...";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["status"] = 2;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
    }

 } else {
        $result["status"] = 0;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
 }

?>