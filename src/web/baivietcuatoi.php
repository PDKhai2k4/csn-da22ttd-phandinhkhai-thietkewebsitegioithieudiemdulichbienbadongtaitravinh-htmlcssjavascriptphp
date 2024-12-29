<?php
include "./db_connect.php";
include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>DU LỊCH BIỂN BA ĐỘNG</title>
    <style>
        #userIcon {
    font-size: 30px; /* Điều chỉnh kích thước biểu tượng */
    color: #333; /* Màu sắc của biểu tượng */
}
         .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            
            list-style: none;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
        }
        .dropdown-item {
            padding: 10px;
            text-decoration: none;
            display: block;
            color: black;
        }
        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
        .show-dropdown {
            display: block;
        } 
        .form-and-post {
            display: flex;
            justify-content: space-between;
            margin: 20px;
            gap: 20px;
        }
        .form-column {
            width: 48%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-column h2 {
            text-align: center;
            color: #007bff;
        }
        .form-column form {
            display: flex;
            flex-direction: column;
        }
        .form-column label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-column input,
        .form-column textarea,
        .form-column button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-column button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-column button:hover {
            background-color: #0056b3;
        }
        .post-column {
            width: 48%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        .post h3 {
            color: #333;
            margin: 0 0 10px;
        }
        .post p {
            color: #666;
            line-height: 1.6;
        }
        .post {
            background-color: #ffffff;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .post .actions {
            margin-top: 10px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="trangchu.html" target="_self"><img src="images/logo.jpg" alt="bienbadong" width="100px" height="74.5px"></a>
        </div>
        <div class="menu">
            <li><a href="trangchu.php" target="_self" id="mn"><i class="fas fa-home"></i>TRANG CHỦ</a></li>
            <li><a href="gioithieu.php" target="_self" id="mn">GIỚI THIỆU</a></li>
            <li><a href="dacdiem.php" target="_self" id="mn">ĐẶC ĐIỂM</a></li>
            <li><a href="trainghiem.php" target="_self" id="mn">TRẢI NGHIỆM</a></li>
            <li><a href="lienhe.php" target="_self" id="mn">LIÊN HỆ</a></li>
        </div>
        <div class="contact">
        <li><i class="bi bi-person" id="userIcon"></i></li>
            <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="baivietcuatoi.php">Bài viết của tôi</a></li>
                <li>
                    <form method="post" action="logout.php">
                        <button href="logout.php" type="submit" name="logout" class="dropdown-item">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <img src="images/nenn.jpg" alt="nen" id="nenn">
    <div id="header">
        <h1>BÀI VIẾT CỦA TÔI</h1>
    </div>
    <div class="form-and-post">
        <div class="form-column">
            <h2>Đăng Bài Viết Mới</h2>
            <form id="postForm" method="POST" enctype="multipart/form-data" action="submit.php">
                <label for="title">Tiêu đề bài viết:</label>
                <input type="text" id="title" name="title" placeholder="Nhập tiêu đề bài viết" required>

                <label for="content">Nội dung bài viết:</label>
                <textarea id="content" name="content" placeholder="Nhập nội dung bài viết" rows="4" required></textarea>

                <label for="image">Tải lên ảnh (không bắt buộc):</label>
                <input type="file" id="image" name="image" accept="image/*">

                <label for="video">Tải lên video (không bắt buộc):</label>
                <input type="file" id="video" name="video" accept="video/*">

                <button type="submit">Gửi</button>
            </form>

        </div>

        <div class="post-column" id="postContainer">
            <h2>Bài Viết Mới Nhất Của Bạn</h2>
            <?php
            require_once 'db_connect.php';

            
            if (!isset($_SESSION['user_id'])) {
                echo "Bạn cần đăng nhập để xem bài viết của mình.";
                exit;
            }

            // Lấy user_id từ session
            $user_id = $_SESSION['user_id'];

            // Cập nhật câu lệnh SQL để chỉ lấy bài viết của người dùng hiện tại
            $sql = "SELECT idposts, title, content, image, video, created_at FROM posts WHERE user_id = ? ORDER BY created_at DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);  // Liên kết tham số user_id với câu truy vấn SQL
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                    echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';

                    if (!empty($row['image'])) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Image" style="max-width:100%; height:auto; margin-top:10px;">';
                    }

                    if (!empty($row['video'])) {
                        echo '<video controls style="max-width:100%; height:auto; margin-top:10px;">';
                        echo '<source src="' . htmlspecialchars($row['video']) . '" type="video/mp4">';
                        echo 'Your browser does not support the video tag.';
                        echo '</video>';
                    }

                    echo '<p style="font-size: 0.8em; color: #888; margin-top: 10px;">Đăng vào: ' . $row['created_at'] . '</p>';
                    echo '<div class="actions">';
                    echo '<a href="edit.php?id=' . $row['idposts'] . '">Sửa</a> | ';
                    echo '<a href="delete.php?id=' . $row['idposts'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bài viết này?\')">Xóa</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Chưa có bài viết nào.</p>';
            }

            $stmt->close();
            $conn->close();
            ?>

        </div>
    </div>
    <script>
        document.getElementById("userIcon").addEventListener("click", function() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("show-dropdown");
        });
        document.getElementById('postForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Ngừng hành động mặc định (không gửi form trực tiếp)

    const formData = new FormData(this); // Lấy dữ liệu từ form, bao gồm cả ảnh và video

    // Gửi dữ liệu lên server
    fetch('submit.php', {
        method: 'POST',
        body: formData, // Chuyển dữ liệu form đi
    })
    .then(response => response.json()) // Nhận dữ liệu trả về dưới dạng JSON
    .then(data => {
        if (data.success) {
            // Cập nhật bài viết mới trong phần hiển thị
            const postContainer = document.getElementById('postContainer');
            const newPost = document.createElement('div');
            newPost.classList.add('post');
            newPost.innerHTML = `
                <h3>${data.title}</h3>
                <p>${data.content}</p>
                ${data.image ? `<img src="${data.image}" alt="Image" style="max-width:100%; height:auto; margin-top:10px;">` : ''}
                ${data.video ? `<video controls style="max-width:100%; height:auto; margin-top:10px;">
                    <source src="${data.video}" type="video/mp4">Your browser does not support the video tag.
                </video>` : ''}
                <p style="font-size: 0.8em; color: #888; margin-top: 10px;">Đăng vào: ${data.created_at}</p>
            `;
            postContainer.insertBefore(newPost, postContainer.firstChild); // Chèn bài viết mới vào đầu danh sách bài viết
            document.getElementById('postForm').reset(); // Reset form sau khi gửi bài
        } else {
            alert('Lỗi: ' + data.message); // Thông báo lỗi nếu có
        }
    })
    .catch(error => {
        alert('Đã có lỗi xảy ra.'); // Thông báo lỗi nếu có sự cố trong quá trình gửi
    });
});

    </script>
</body>
</html>
