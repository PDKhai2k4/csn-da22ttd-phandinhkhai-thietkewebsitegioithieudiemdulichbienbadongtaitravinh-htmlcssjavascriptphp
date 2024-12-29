<?php
require_once 'db_connect.php';
session_start();

// Kiểm tra nếu người dùng đã gửi form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Bạn phải đăng nhập để đăng bài.']);
        exit;
    }

    // Lấy ID người dùng từ session
    $user_id = $_SESSION['user_id'];
// Lấy dữ liệu từ form
$title = $_POST['title'];
$content = $_POST['content'];

// Kiểm tra và xử lý ảnh
$image = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    // Kiểm tra lỗi và xử lý ảnh
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageName = basename($_FILES['image']['name']);
    $imagePath = 'uploads/' . $imageName;
    
    // Kiểm tra nếu thư mục 'uploads' không tồn tại, tạo mới
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if (move_uploaded_file($imageTmpName, $imagePath)) {
        $image = $imagePath; // Lưu đường dẫn ảnh vào cơ sở dữ liệu
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi tải ảnh lên.']);
        exit;
    }
}

// Kiểm tra và xử lý video
$video = '';
if (isset($_FILES['video']) && $_FILES['video']['error'] == UPLOAD_ERR_OK) {
    // Kiểm tra lỗi và xử lý video
    $videoTmpName = $_FILES['video']['tmp_name'];
    $videoName = basename($_FILES['video']['name']);
    $videoPath = 'uploads/' . $videoName;

    if (move_uploaded_file($videoTmpName, $videoPath)) {
        $video = $videoPath; // Lưu đường dẫn video vào cơ sở dữ liệu
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi tải video lên.']);
        exit;
    }
}

// Lưu bài viết vào cơ sở dữ liệu
$sql = "INSERT INTO posts (title, content, image, video, user_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $title, $content, $image, $video, $user_id);
$stmt->execute();
$stmt->close();

// Trả về kết quả dưới dạng JSON
echo json_encode([
    'success' => true,
    'title' => $title,
    'content' => $content,
    'image' => $image,
    'video' => $video,
    'created_at' => date('Y-m-d H:i:s')
]);

$conn->close();
}
?>