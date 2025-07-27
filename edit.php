<?php
require "load.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current data for the student
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit;
    } 
} else {
    echo "Invalid request.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update the student's details
    $sql = "UPDATE students SET first_name = ?, last_name = ?, email = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $address, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
        header("Location: table-db.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($row['address']); ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
