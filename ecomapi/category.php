<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";


$name=$_POST['name'];
$pic = $_FILES['file']['name'];
$pic_temp = $_FILES['file']['tmp_name'];

$uni = md5(random_bytes(64)); 
$unif = substr($uni, 0, 6);
$pic_f = $unif.$pic;


if($name !=null && $pic != null) {

$findexist = "SELECT * from categories where name='$name'";
$resultsearch = mysqli_query($conn, $findexist);
if (mysqli_num_rows($resultsearch) > 0) {
     
        $result["status"] = 2;
        $result["message"] = "Category already exist...";
        echo json_encode($result);
        mysqli_close($conn);   
    
} else {
    
    $sql = "INSERT INTO categories (name, img) VALUES ('$name','$pic_f');";

    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($pic_temp,"./assets/category/$pic_f");
        $result["status"] = 1;
        $result["message"] = "Category added successfully...";
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
