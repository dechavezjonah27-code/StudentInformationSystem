<?php
include 'db_connect.php';

if(isset($_POST['first_name'], $_POST['last_name'], $_POST['email'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $first_name, $last_name, $email);
    
    echo $stmt->execute() ? "success" : "error";
}
?>