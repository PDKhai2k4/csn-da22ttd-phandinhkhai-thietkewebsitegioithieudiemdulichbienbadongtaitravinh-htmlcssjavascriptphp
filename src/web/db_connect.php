<?php
// Cấu hình kết nối với MySQL sử dụng MySQLi
$servername = "localhost";
$username = "root"; // Tên đăng nhập
$password = ""; // Mật khẩu
$dbname = "bienbadong"; // Tên cơ sở dữ liệu

// Tạo kết nối với MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>