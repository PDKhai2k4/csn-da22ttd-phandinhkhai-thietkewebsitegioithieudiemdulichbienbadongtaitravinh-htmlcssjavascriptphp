<?php
include "./db_connect.php"; // Kết nối cơ sở dữ liệu

// Truy vấn để lấy tất cả bài viết từ bảng 'posts'
$query = "SELECT * FROM posts ORDER BY created_at DESC"; // Sắp xếp theo thời gian tạo (mới nhất trước)
$result = mysqli_query($conn, $query);

$posts = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row; // Lưu tất cả bài viết vào mảng
    }
}

// Trả về các bài viết dưới dạng JSON
echo json_encode($posts);
?>
