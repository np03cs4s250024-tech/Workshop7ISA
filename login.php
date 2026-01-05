<?php
session_start();
require "db.php";

if (isset($_POST['login'])) {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $student = $result->fetch_assoc();

        if (password_verify($password, $student['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['student_name'] = $student['name'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect Password!";
        }
    } else {
        echo "Student ID Not Found!";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <input type="text" name="student_id" placeholder="Student ID" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="login">Login</button>
</form>
