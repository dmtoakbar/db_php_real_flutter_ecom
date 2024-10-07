<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";


$name=$_POST['name'];
$id = $_POST['id'];

if($name !=null && $id != null) {

$findexist = "SELECT * from categories where name='$name' and id != '$id'";
$resultsearch = mysqli_query($conn, $findexist);
if (mysqli_num_rows($resultsearch) > 0) {
     
        $result["status"] = 2;
        $result["message"] = "Category already exist...";
        echo json_encode($result);
        mysqli_close($conn);   
    
} else {

    if($_FILES['file']['name'] != null) {

        $exist_query = "SELECT * FROM categories WHERE id='$id'";
        $exist = mysqli_query($conn, $exist_query);
        $row = mysqli_fetch_array($exist);
        $oldImage = $row['img'];

        $pic = $_FILES['file']['name'];
        $pic_temp = $_FILES['file']['tmp_name'];

        $uni = md5(random_bytes(64)); 
        $unif = substr($uni, 0, 6);
        $pic_f = $unif.$pic;

        $sql = "UPDATE categories SET name='$name', img='$pic_f' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {

            move_uploaded_file($pic_temp,"./assets/category/$pic_f");

            unlink("./assets/category/".$oldImage);

            $result["status"] = 1;
            $result["message"] = "Category upated successfully...";
            echo json_encode($result);
            mysqli_close($conn);
        } else {
            $result["status"] = 0;
            $result["message"] = "Something went wrong, Please try again...";
            echo (json_encode($result).mysqli_error($conn));
            mysqli_close($conn);
        }
    } else {

        $sql = "UPDATE categories SET name='$name' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            $result["status"] = 1;
            $result["message"] = "Category updated successfully...";
            echo json_encode($result);
            mysqli_close($conn);
        } else {
            $result["status"] = 0;
            $result["message"] = "Something went wrong, Please try again...";
            echo (json_encode($result).mysqli_error($conn));
            mysqli_close($conn);
        }
    }
    
}

} else {
   
        $result["status"] = 3;
        $result["message"] = "Something went wrong, Please try again...";
        echo (json_encode($result).mysqli_error($conn));
        mysqli_close($conn);
}


?>
