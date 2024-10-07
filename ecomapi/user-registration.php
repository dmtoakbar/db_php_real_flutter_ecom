<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";


$name=$_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$code = strtoupper($_POST['code']);

if($email != null && $name != null && $password != null) {

$findexist = "SELECT * from users where email='$email'";
$resultsearch = mysqli_query($conn, $findexist);
if (mysqli_num_rows($resultsearch) > 0) {
     
       $row = mysqli_fetch_array($resultsearch);
       
        if($row['is_otp_verified'] != 1) {
        $result["status"] = 4;
        $result["message"] = "User registered, but not email verified...";
        echo json_encode($result);
        mysqli_close($conn);
        } else {
        $result["status"] = 2;
        $result["message"] = "User already exist...";
        echo json_encode($result);
        mysqli_close($conn);   
        }
    
} else {
    
    $sql = "INSERT INTO users (name, email, password, code) VALUES ('$name','$email', '$password', '$code');";

    if (mysqli_query($conn, $sql)) {
        $result["status"] = 1;
        $result["message"] = "Registration success";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["status"] = 0;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
    }
}

} else {
   
        $result["status"] = 3;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
}


?>
