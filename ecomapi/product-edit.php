<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";


$id = $_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$description=$_POST['description'];


if($name !=null && $id != null && $price != null && $description != null) {


    if($_FILES['file']['name'] != null) {

        $exist_query = "SELECT * FROM products WHERE id='$id'";
        $exist = mysqli_query($conn, $exist_query);
        $row = mysqli_fetch_array($exist);
        $oldImage = $row['img'];

        $pic = $_FILES['file']['name'];
        $pic_temp = $_FILES['file']['tmp_name'];

        $uni = md5(random_bytes(64)); 
        $unif = substr($uni, 0, 6);
        $pic_f = $unif.$pic;

        $sql = "UPDATE products SET name='$name', price='$price', description='$description', img='$pic_f' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {

            move_uploaded_file($pic_temp,"./assets/product/$pic_f");

            unlink("./assets/product/".$oldImage);

            $result["status"] = 1;
            $result["message"] = "Product upated successfully...";
            echo json_encode($result);
            mysqli_close($conn);
        } else {
            $result["status"] = 0;
            $result["message"] = "Something went wrong, Please try again...";
            echo (json_encode($result).mysqli_error($conn));
            mysqli_close($conn);
        }
    } else {

        $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            $result["status"] = 1;
            $result["message"] = "Product updated successfully...";
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
   
        $result["status"] = 2;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
}


?>
