<?php

require_once 'dbConnect.php';

$name = $_GET['name'];
$roll = $_GET['roll'];

$sql = "INSERT INTO student (name, roll) VALUES (?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $name, $roll);

if ($stmt->execute()) {
    $response = array("status" => "success", "message" => "New record created successfully");
    echo json_encode($response);
} else {
    $response = array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error);
    echo json_encode($response);
}

$stmt->close();
$conn->close();

?>
