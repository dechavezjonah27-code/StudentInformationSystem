<?php
include 'db_connect.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM students WHERE student_id=?");
    $stmt->bind_param("i", $id);
    echo $stmt->execute() ? "success" : "error";
}
?>