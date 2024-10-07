<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

if($email != null && $password != null) {

$findexist = "SELECT * from users where email='$email' and password='$password'";
$resultsearch = mysqli_query($conn, $findexist);

if (mysqli_num_rows($resultsearch) > 0) {
     
       $row = mysqli_fetch_array($resultsearch);
       
        if($row['is_otp_verified'] == 1) {

        $result["status"] = 1;
        $result["message"] = "You logged in successfully...";
        echo json_encode($result);
        mysqli_close($conn);

        } else {

        $result["status"] = 2;
        $result["message"] = "Email is not verified, Please verify it...";
        echo json_encode($result);
        mysqli_close($conn); 

        }
    
} else {
    
        $result["status"] = 3;
        $result["message"] = "Email or password is wrong, Please try again..";
        echo json_encode($result);
        mysqli_close($conn);
  
}

} else {
   
        $result["status"] = 0;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
}


?>
