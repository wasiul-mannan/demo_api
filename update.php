<?php

require_once 'dbConnect.php';

$id = $_GET['id'];
$name = $_GET['name'];
$roll = $_GET['roll'];

$sql = "UPDATE student SET name=?, roll=? WHERE id=?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssi", $name, $roll, $id); 

    if ($stmt->execute()) {
        $response = array("status" => "success", "message" => "Record updated successfully");
        echo json_encode($response);
    } else {
        $response = array("status" => "error", "message" => "Error updating record: " . $stmt->error);
        echo json_encode($response);
    }

    $stmt->close();
} else {
    $response = array("status" => "error", "message" => "Error preparing statement: " . $conn->error);
    echo json_encode($response);
}

$conn->close();

?>
