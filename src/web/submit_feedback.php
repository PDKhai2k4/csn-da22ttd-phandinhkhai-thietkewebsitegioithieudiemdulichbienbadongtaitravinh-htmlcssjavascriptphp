<?php
// Kết nối cơ sở dữ liệu
include "db_connect.php";

session_start(); // Bắt đầu session để sử dụng thông tin đăng nhập

$response = [
    "success" => false,
    "message" => "Có lỗi xảy ra. Vui lòng thử lại sau.",
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $rating = $_POST['rating'] ?? '';
    $message = $_POST['message'] ?? '';

    // Lấy user_id từ session nếu người dùng đã đăng nhập
    $user_id = $_SESSION['user_id'] ?? null;

    if ($user_id && !empty($name) && !empty($email) && !empty($rating) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO feedbacks (user_id, name, email, rating, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issis", $user_id, $name, $email, $rating, $message);

        if ($stmt->execute()) {
            $response = [
                "success" => true,
                "message" => "Phản hồi của bạn đã được gửi thành công!",
            ];
        } else {
            $response["message"] = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu.";
        }

        $stmt->close();
    } else {
        $response["message"] = "Vui lòng điền đầy đủ thông tin hoặc đăng nhập trước khi gửi phản hồi.";
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
