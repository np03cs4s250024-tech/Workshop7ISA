<?php
require "db.php";

if (isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO students (student_id, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_id, $name, $hashed);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: Could not register!";
    }
}
?>

<h2>Register</h2>
<form method="POST">
    <input type="text" name="student_id" placeholder="Student ID" required><br><br>
    <input type="text" name="name" placeholder="Full Name" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="register">Register</button>
</form>
