<?php
require "load.php";
$sql = "SELECT * FROM students";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'>   
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
     
    </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['address']}</td>
            <td>
                <a href='delete.php?id={$row['id']}'>Delete</a> |
                <a href='edit.php?id={$row['id']}'>Edit</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>