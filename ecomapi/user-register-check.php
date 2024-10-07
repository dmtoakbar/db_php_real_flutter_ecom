<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$email = $_POST['email'];

if($email != null) {

$findexist = "SELECT * from users where email='$email'";
$resultsearch = mysqli_query($conn, $findexist);

if (mysqli_num_rows($resultsearch) > 0) {
       
        $result["status"] = 1;
        $result["message"] = "Email is registered...";
        echo json_encode($result);
        mysqli_close($conn);
        
    
} else {
    
        $result["status"] = 2;
        $result["message"] = "Email is not registered...";
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
