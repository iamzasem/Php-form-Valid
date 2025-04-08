<?php
require "load.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
        header("Location: table-db.php"); // Redirect to the table page
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>