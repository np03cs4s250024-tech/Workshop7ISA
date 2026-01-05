<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE['theme'] ?? "light";

$bg = $theme === "dark" ? "black" : "white";
$color = $theme === "dark" ? "white" : "black";
?>

<body style="background: <?= $bg ?>; color: <?= $color ?>;">
<h1>Welcome, <?= $_SESSION['student_name']; ?></h1>

<a href="preference.php">Change Theme</a>
<br><br>

<form action="logout.php" method="POST">
    <button>Logout</button>
</form>
</body>
