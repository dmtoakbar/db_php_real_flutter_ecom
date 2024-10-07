<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$cat = $_POST['cat'];
$pic = $_FILES['file']['name'];
$pic_temp = $_FILES['file']['tmp_name'];

$uni = md5(random_bytes(64)); 
$unif = substr($uni, 0, 6);
$pic_f = $unif.$pic;


if($cat != null && $pic != null) {

    
    $sql = "INSERT INTO sliders (cat, img) VALUES ('$cat', '$pic_f');";

    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($pic_temp,"./assets/slider/$pic_f");
        $result["status"] = 1;
        $result["message"] = "Slider added successfully...";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["status"] = 0;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
    }

} else {
   
        $result["status"] = 2;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
}


?>
