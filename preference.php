<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['save'])) {
    $theme = $_POST['theme'];

    setcookie("theme", $theme, time() + 86400 * 30, "/");

    header("Location: dashboard.php");
    exit();
}
?>

<h2>Select Theme Preference</h2>

<form method="POST">
    <select name="theme">
        <option value="light">Light Mode</option>
        <option value="dark">Dark Mode</option>
    </select>
    <br><br>
    <button name="save">Save Preference</button>
</form>
