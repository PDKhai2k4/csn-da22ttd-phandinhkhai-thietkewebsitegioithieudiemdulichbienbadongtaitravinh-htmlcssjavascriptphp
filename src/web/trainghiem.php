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
        .content {
    min-height: 80vh; /* Chiều cao tối thiểu cho phần nội dung chính */
}

footer {
    clear: both;
    position: relative;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    padding: 20px 0;
    text-align: center;
}

        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}
#userIcon {
    font-size: 30px; /* Điều chỉnh kích thước biểu tượng */
    color: #333; /* Màu sắc của biểu tượng */
}
/* Giấu dropdown menu khi chưa click */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 50px; /* Điều chỉnh khoảng cách từ icon */
    
    list-style: none;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 200px; /* Đặt chiều rộng dropdown */
}

/* Style cho các item trong dropdown */
.dropdown-item {
    padding: 10px;
    text-decoration: none;
    display: block;
    color: black;
}

.dropdown-item:hover {
    background-color: #f1f1f1;
}
/* Hiển thị dropdown khi icon được click */
.show-dropdown {
    display: block;
}
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Header */
.header {
    background-color: #007bff;
    color: white;
    padding: 15px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header .logo img {
    height: 50px;
}

.navbar ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    margin: 0 10px;
}

.navbar ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 16px;
    transition: opacity 0.3s ease;
}

.navbar ul li a:hover {
    opacity: 0.7;
}

/* Intro Section */
.intro-section {
    background: linear-gradient(135deg, #007bff, #1e90ff);
    color: white;
    text-align: center;
    padding: 60px 20px;
    border-radius: 5px;
}

.intro-section h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.intro-section p {
    font-size: 18px;
    margin: 0;
}
.feedback-column {
    width: 100%;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.feedback-column h2 {
    text-align: center;
    color: #007bff;
}

.feedback-column label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.feedback-column input,
.feedback-column textarea,
.feedback-column button {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
    box-sizing: border-box;
}

.feedback-column button {
    background-color: #007bff;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
}

.feedback-column button:hover {
    background-color: #0056b3;
}

.posts-column {
    width: 100%;
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.posts-column h2 {
    text-align: center;
    color: #343a40;
}

.posts-column .post {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.posts-column .post h3 {
    margin: 0 0 10px;
    font-size: 18px;
    color: #007bff;
}

.posts-column .post p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

.posts-column .post small {
    display: block;
    text-align: right;
    color: #aaa;
    font-size: 12px;
}
.feedback-and-posts {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.feedback-column,
.posts-column {
    flex: 1;
    min-width: 300px;
}

.feedback-column {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.posts-column {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
/* Cải thiện kiểu dáng cho ảnh và video trong bài viết */
.post-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-top: 10px;
}

.post-video {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-top: 10px;
}

            
    </style>
</head>
<body>
    <header>
        
        <div class="logo">
            <a href="trangchu.html" target="_self"><img src="images/logo.jpg" alt="bienbadong" width="100px" height="74.5px"></a>
        </div>
        <div class="menu">
            <li><a href="trangchu.php" target="_self"id="mn"><i class="fas fa-home"></i>TRANG CHỦ</a></li>
            <li><a href="gioithieu.php" target="_self"id="mn">GIỚI THIỆU</a></li>
            <li><a href="dacdiem.php" target="_self"id="mn">ĐẶC ĐIỂM</a></li>
            <li><a href="trainghiem.php" target="_self"id="mn">TRẢI NGHIỆM</a></li>
            <li><a href="lienhe.php" target="_self"id="mn">LIÊN HỆ</a></li>
        </div>
        <div class="contact">
            <li><i class="bi bi-person" id="userIcon"></i></li>
            <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="baivietcuatoi.php">Bài viết của tôi</a></li>
                <li>
                    <!-- Form đăng xuất ngay trong dropdown -->
                    <form method="post" action="logout.php">
                        <button href="logout.php" type="submit" name="logout" class="dropdown-item">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <img src="images/nenn.jpg" alt="nen" id="nenn">
    <div id="header">
        <h1>TRẢI NGHIỆM VÀ PHẢN HỒI CỦA BẠN VỀ CHÚNG TÔI</h1>
    </div>
 <!------------------------------------------------------------------------------------------------------------------------------------------>
        <div class="feedback-and-posts">
            <!-- Cột phản hồi -->
            <div class="feedback-column">
                <h2>Phản hồi của bạn</h2>
                <form id="feedbackForm">
                    <label for="name">Tên của bạn:</label>
                    <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>

                    <label for="rating">Đánh giá:</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" placeholder="1 - 5" required>

                    <label for="message">Lời nhắn:</label>
                    <textarea id="message" name="message" placeholder="Nhập phản hồi của bạn" required></textarea>

                    <button type="submit">Gửi phản hồi</button>
                </form>
            </div>

            <div class="posts-column">
                <h2>Các bài viết đã đăng</h2>       
                <div id="postsContainer">
                    <!-- Các bài viết sẽ được tải và hiển thị tại đây -->
            </div>
        </div>



 <!--------------------------------------------------------------------------------------------------------------------------------------->
 
    
    <footer>
        <div class="footer-container">
          <!-- Thông tin liên hệ -->
          <div class="footer-column">
            <h3>Thông tin liên hệ</h3>
            <p>Địa chỉ: Biển Ba Động, Trường Long Hòa, Duyên Hải, Trà Vinh, Việt Nam</p>
            <p>Điện thoại: (+84) XXX XXX XXX</p>
            <p>Email: <a href="mailto:info@bienbadong.com">info@bienbadong.com</a></p>
          </div>
      
          <!-- Liên kết nhanh -->
          <div class="footer-column">
            <h3>Liên kết nhanh</h3>
            <ul>
              <li><a href="trangchu.php">Trang Chủ</a></li>
              <li><a href="gioithieu.php">Giới Thiệu</a></li>
              <!-- <li><a href="#datdiem">Thư Viện Hình Ảnh</a></li>
              <li><a href="#trainghiem">Hướng Dẫn Du Lịch</a></li> -->
              <li><a href="lienhe.html">Liên Hệ</a></li>
            </ul>
          </div>
      
          <!-- Mạng xã hội -->
          <div class="footer-column">
            <h3>Mạng xã hội</h3>
            <ul class="social-links">
              <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
              <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
              <li><a href="https://youtube.com" target="_blank">YouTube</a></li>
            </ul>
          </div>
      
          <!-- Bản quyền -->
          <div class="footer-bottom">
            <p>© 2024 Biển Ba Động. Mọi quyền được bảo lưu.</p>
            <p>Thiết kế bởi: <a href="#">Phan Đình Khải</a></p>
          </div>
        </div>
      </footer>
</body>

<script>
    document.getElementById("userIcon").addEventListener("click", function() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.classList.toggle("show-dropdown");
});

  /*----------------------------------------------------------------*/ 
    const header = document.querySelector("header")
    window.addEventListener("scroll",function(){
        x = window.pageYOffset
        if(x>0){
            header.classList.add("sticky")
        }
        else{
            header.classList.remove("sticky")
        }
    })
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotitem = document.querySelectorAll(".dot")
    let imgNumber = imgPosition.length
    let index=0
    imgPosition.forEach(function(images,index){
        images.style.left = index*100+"%"
        dotitem[index].addEventListener("click",function() {
        slider(index) 
        })
    })
    function imgslider (){
        index++;
        console.log(index)
        if (index>=imgNumber){index=0}
        slider(index)
    }
    function slider (index){
        imgContainer.style.left= "-"+index*100+"%"
        const dotactive = document.querySelector('.active')
        dotactive.classList.remove("active")
        dotitem[index].classList.add("active")
    }
    setInterval(imgslider,5000)
    /* -------------------------------------------------------*/
    document.getElementById("feedbackForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("submit_feedback.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                document.getElementById("feedbackForm").reset();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Lỗi:", error));
});
/*------------------------------------------------------------ */
function loadPosts() {
    fetch("get_post.php") // Gọi đến file PHP để lấy dữ liệu bài viết
        .then(response => response.json()) // Chuyển đổi dữ liệu trả về thành JSON
        .then(posts => {
            const postsContainer = document.getElementById("postsContainer");
            postsContainer.innerHTML = ""; // Xóa nội dung cũ

            // Kiểm tra nếu không có bài viết
            if (posts.length === 0) {
                postsContainer.innerHTML = "<p>Hiện tại không có bài viết nào.</p>";
                return;
            }

            // Lặp qua tất cả các bài viết và hiển thị
            posts.forEach(post => {
                const postElement = document.createElement("div");
                postElement.classList.add("post"); // Thêm lớp cho bài viết

                let mediaContent = ''; // Biến để lưu phần ảnh/video

                // Kiểm tra và hiển thị ảnh (nếu có)
                if (post.image) {
                    mediaContent += `<img src="${post.image}" alt="Post Image" class="post-image" />`;
                }

                // Kiểm tra và hiển thị video (nếu có)
                if (post.video) {
                    mediaContent += `<video controls class="post-video"><source src="${post.video}" type="video/mp4">Your browser does not support the video tag.</video>`;
                }

                postElement.innerHTML = `
                    <h3>${post.title}</h3>
                    <p>${post.content}</p>
                    ${mediaContent} <!-- Hiển thị ảnh và video nếu có -->
                    <small>Đăng bởi: ${post.author} vào lúc ${new Date(post.created_at).toLocaleString()}</small>
                `;

                postsContainer.appendChild(postElement); // Thêm bài viết vào container
            });
        })
        .catch(error => console.error("Lỗi khi tải bài viết:", error)); // In lỗi nếu có
}

// Gọi hàm loadPosts khi trang đã được tải
document.addEventListener("DOMContentLoaded", loadPosts);




</script>

</html>