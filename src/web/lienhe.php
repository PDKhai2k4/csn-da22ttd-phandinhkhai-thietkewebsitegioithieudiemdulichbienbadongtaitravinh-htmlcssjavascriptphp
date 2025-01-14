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
        body {
            font-family: Arial, sans-serif;
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
        #content {
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        .map-container {
        margin: 20px 0;
        border: 2px solid #ddd; /* Viền cho bản đồ */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
 <!---------------------------------------------------------------------------------------------------------------->
    <div id="header">
        <h1>Thông tin Biển Ba Động</h1>
    </div>
    <div id="content">
        <p>Địa chỉ: Biển Ba Động, Trường Long Hòa, Duyên Hải, Trà Vinh, Việt Nam</p>
        <p>Điện thoại: (+84) XXX XXX XXX</p>
        <p>Email: <a href="mailto:info@bienbadong.com">info@bienbadong.com</a></p>
    </div>
    </div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15734.684382925192!2d106.54163360595705!3d9.623561841940873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x319f87c715f53455%3A0x5b944d5f228e7bbc!2zS2h1IER1IEzhu4tjaCBCaeG7g24gQmEgxJDhu5luZw!5e0!3m2!1svi!2s!4v1732464233733!5m2!1svi!2s" 
        width="600" height="450" style="border:0;" 
        allowfullscreen="" loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
 <!----------------------------------------------------------------------------------------------------------------------->
    
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
</script>
</html>
