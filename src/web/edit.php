<?php
include "db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lấy thông tin bài viết từ cơ sở dữ liệu
    $sql = "SELECT * FROM posts WHERE idposts = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Bài viết không tồn tại.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $video = $_FILES['video']['name'];

    // Xử lý tải ảnh và video
    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
    }
    if ($video) {
        move_uploaded_file($_FILES['video']['tmp_name'], 'uploads/' . $video);
    }

    // Cập nhật bài viết vào cơ sở dữ liệu
    $update_sql = "UPDATE posts SET title = ?, content = ?, image = ?, video = ? WHERE idposts = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssi", $title, $content, $image, $video, $id);
    if ($stmt->execute()) {
        header("Location: baivietcuatoi.php");
    } else {
        echo "Lỗi: Không thể cập nhật bài viết.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Bài Viết</title>
    <style>
        /* Thiết lập kiểu font toàn bộ trang */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Tiêu đề trang */
        h1 {
            color: #4CAF50;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        /* Định dạng form */
        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 650px;
            transition: all 0.3s ease;
        }

        form:hover {
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.15);
        }

        /* Label cho các input */
        label {
            font-size: 1rem;
            color: #555;
            margin-bottom: 8px;
            display: block;
            font-weight: 600;
        }

        /* Các input và textarea */
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        /* Khi người dùng focus vào input */
        input[type="text"]:focus, textarea:focus, input[type="file"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Textarea */
        textarea {
            resize: vertical;
            min-height: 150px;
        }

        /* Nút Submit */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        /* Hiệu ứng khi hover vào nút */
        button:hover {
            background-color: #45a049;
        }

        /* Input file (Tải ảnh, video) */
        input[type="file"] {
            padding: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 6px;
            color: #777;
        }

        /* Media query để cải thiện trải nghiệm trên thiết bị di động */
        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <h1>Sửa Bài Viết</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Tiêu đề bài viết:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>

        <label for="content">Nội dung bài viết:</label>
        <textarea id="content" name="content" rows="4" required><?php echo htmlspecialchars($post['content']); ?></textarea>

        <label for="image">Tải lên ảnh (không bắt buộc):</label>
        <input type="file" id="image" name="image" accept="image/*">

        <label for="video">Tải lên video (không bắt buộc):</label>
        <input type="file" id="video" name="video" accept="video/*">

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
