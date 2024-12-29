<?php
include "db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa bài viết khỏi cơ sở dữ liệu
    $delete_sql = "DELETE FROM posts WHERE idposts = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: baivietcuatoi.php"); // Chuyển hướng về trang bài viết của tôi
    } else {
        echo "Lỗi: Không thể xóa bài viết.";
    }
}
?>
