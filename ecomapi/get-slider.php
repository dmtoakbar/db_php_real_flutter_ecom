<?php
header("Access-Control-Allow-Origin: *");
include "db-connection.php";

$sql = "SELECT * FROM sliders";
$result = $conn->query($sql);
$response = array();
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($response, $row);
    }
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>