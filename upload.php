<?php
include 'conection.php';
header('Access-Control-Allow-Origin: *');
$target_path = "uploads/";
 
$target_path = $target_path . basename( $_FILES['file']['name']);
$nameImage = $_FILES['file']['name'];
 
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    header('Content-type: application/json');
    $data = ['success' => true, 'message' => 'Upload and move success'];
    $sql = "INSERT INTO imagen (nombre)
            VALUES ( '$nameImage' )";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo json_encode( $data );
            $conn->close();
   
} else{
    header('Content-type: application/json');
    $data = ['success' => false, 'message' => 'There was an error uploading the file, please try again!'];
    echo json_encode( $data );
}
 
?>