<?php
include 'db_connect.php';
$result = $conn->query("SELECT * FROM students");

while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>{$row['student_id']}</td>
        <td>{$row['first_name']}</td>
        <td>{$row['last_name']}</td>
        <td>{$row['email']}</td>
        <td>
            <button class='edit' data-id='{$row['student_id']}'>Edit</button>
            <button class='delete' data-id='{$row['student_id']}'>Delete</button>
        </td>
    </tr>";
}
?>