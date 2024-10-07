<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$findexist = "SELECT * from users where email='$email'";
$resultsearch = mysqli_query($conn, $findexist);
if (mysqli_num_rows($resultsearch) > 0) {
    
    $query="UPDATE users SET password='$password' WHERE email='$email'";

    if (mysqli_query($conn, $query)) {
        $result["status"] = 1;
        $result["message"] = "Password updated successfully...";
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