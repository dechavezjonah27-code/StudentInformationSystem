<?php
include 'db_connect.php';

if(isset($_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'])){
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE students SET first_name=?, last_name=?, email=? WHERE student_id=?");
    $stmt->bind_param("sssi", $first_name, $last_name, $email, $id);
    echo $stmt->execute() ? "success" : "error";
}
?>