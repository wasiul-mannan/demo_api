<?php

require_once 'dbConnect.php';

$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id); 

    if ($stmt->execute()) {
        $response = array("status" => "success", "message" => "Record deleted successfully");
        echo json_encode($response);
    } else {
        $response = array("status" => "error", "message" => "Error deleting record: " . $stmt->error);
        echo json_encode($response);
    }

    $stmt->close();
} else {
    $response = array("status" => "error", "message" => "Error preparing statement: " . $conn->error);
    echo json_encode($response);
}

$conn->close();

?>
