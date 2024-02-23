<?php

require_once 'dbConnect.php';

$sql = "SELECT id, name, roll FROM student";
$stmt = $conn->prepare($sql);

$stmt->execute();

$stmt->bind_result($id, $name, $roll);

$students = array();
while ($stmt->fetch()) {
    $student = array(
        "id" => $id,
        "name" => $name,
        "roll" => $roll
    );
    array_push($students, $student);
}

if (count($students) > 0) {
    echo json_encode($students);
} else {
    echo json_encode(array("message" => "No students found"));
}

$stmt->close();
$conn->close();

?>
