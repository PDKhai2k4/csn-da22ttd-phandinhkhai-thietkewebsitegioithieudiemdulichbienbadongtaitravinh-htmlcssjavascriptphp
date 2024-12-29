<?php
session_start();

// Nếu không có user_id trong session, chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
