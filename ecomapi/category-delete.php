<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$id = $_POST['id'];

if($id != null) {

    $exist_query = "SELECT * FROM categories WHERE id='$id'";
    $exist = mysqli_query($conn, $exist_query);
    $row = mysqli_fetch_array($exist);
    $oldImage = $row['img'];

    $sql = "DELETE FROM categories WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        unlink("./assets/category/".$oldImage);

        $result["status"] = 1;
        $result["message"] = "Category delete successfully...";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["status"] = 0;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
    }
  

} else {
   
    $result["status"] = 3;
    $result["message"] = "Something went wrong, Please try again...";
    echo (json_encode($result).mysqli_error($conn));
    mysqli_close($conn);
}


?>
