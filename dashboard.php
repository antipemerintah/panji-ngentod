<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
echo "Selamat datang, " . $_SESSION['username'];
?>
