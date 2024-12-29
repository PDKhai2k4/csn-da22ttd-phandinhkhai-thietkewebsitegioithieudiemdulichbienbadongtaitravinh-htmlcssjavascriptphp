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
        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
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
#userIcon {
    font-size: 30px; /* Điều chỉnh kích thước biểu tượng */
    color: #333; /* Màu sắc của biểu tượng */
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

/* Content Section */
.content-section {
    background-color: white;
    margin: 20px 0;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 90%; /* Căn giữa và tạo khoảng cách hai bên */
          max-width: 1200px; /* Giới hạn chiều rộng */
          margin: 0 auto; /* Căn giữa nội dung */
}

.content-section h2 {
    color: #007bff;
    margin-bottom: 15px;
}

.content-section ul {
    list-style: disc;
    margin: 15px 0 0 20px;
    padding: 0;
}

.content-section ul li {
    margin-bottom: 8px;
}

/* Image Styling */
.image-container {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.image-container img {
    width: 100%;
    max-width: 350px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.image-container img:hover {
    transform: scale(1.05);
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
                    <form method="post" action="index.php">
                        <button href="logout.php" type="submit" name="logout" class="dropdown-item">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <img src="images/nenn.jpg" alt="nen" id="nenn">
    <div id="header">
        <h1>Giới Thiệu Về Biển Ba Động</h1>
        <small>Biển Ba Động là một điểm đến lý tưởng để trải nghiệm vẻ đẹp hoang sơ của thiên nhiên, một nơi lý tưởng để thư giãn và khám phá sự giao hòa giữa con người và biển cả. 
            <br>Vị trí đặc biệt và cảnh sắc thiên nhiên kỳ vĩ tại đây đã khiến nơi này trở thành một phần không thể thiếu trong hành trình du lịch miền Tây Nam Bộ.</small>
    </div>
 <!------------------------------------------------------------------------------------------------------------------------------------------>
 <main>
    <?php
         $sql = "SELECT * FROM baiviet";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
             if($row['tentrang']=="gioithieu"){
         ?>
    <section class="content-section">
        <div class="container">
            <h2><?php echo $row['tieudebaiviet'] ?></h2>
            <p><?php echo $row['noidungbaiviet'] ?></p>
            <div class="image-container">
            <?php
            // Lấy dữ liệu từ cơ sở dữ liệu
            $image_paths = $row['url_image']; // Trường lưu đường dẫn ảnh, có thể là JSON hoặc chuỗi phân tách bằng dấu phẩy

            // Kiểm tra nếu dữ liệu là JSON hợp lệ
            $images = json_decode($image_paths, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($images)) {
                // Xử lý nếu là JSON
                foreach ($images as $image) {
                    echo '<img src="' . htmlspecialchars(trim($image)) . '" alt="Hình Ảnh">';
                }
            } else {
                // Nếu không phải JSON, xử lý như chuỗi phân tách bằng dấu phẩy
                $images = explode(',', $image_paths);
                foreach ($images as $image) {
                    echo '<img src="' . htmlspecialchars(trim($image)) . '" alt="Hình Ảnh">';
                }
            }
            ?>
            </div>
        </div>
    </section>
    <?php
               }  
      }
    } else {
        echo "0 results";
    }
    ?>

     <!-- <section class="content-section">
        <div class="container">
            <h2>Hoạt Động Nổi Bật</h2>
            <ul>
                <li>Thả mình vào làn nước trong xanh, tận hưởng sự tươi mới và mát mẻ của biển.</li>
                <li>Khám phá các món hải sản tươi ngon, được đánh bắt trực tiếp từ biển.</li>
                <li>Dạo chơi trên những con đường làng chài, tìm hiểu về cuộc sống bình dị và nền văn hóa đặc sắc của người dân địa phương.</li>
                <li>Tham gia các hoạt động thể thao biển như chèo thuyền, lướt sóng, hoặc câu cá để trải nghiệm cuộc sống như một ngư dân thực thụ.</li>
            </ul>
            <div class="image-container">
                 Thêm URL hình ảnh của bạn ở đây 
                <img src="<URL_HERE>" alt="Hoạt Động Biển">
                <img src="<URL_HERE>" alt="Thưởng Thức Hải Sản">
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <h2>Thông Tin Du Lịch</h2>
            <p><strong>Vị trí:</strong> Biển Ba Động tọa lạc tại xã Long Đức, huyện Trà Cú, tỉnh Trà Vinh. Từ thành phố Trà Vinh, du khách có thể di chuyển khoảng 40 km để đến được điểm đến tuyệt vời này.</p>
            <p><strong>Thời gian tham quan:</strong> Biển Ba Động có thể tham quan quanh năm, nhưng khoảng thời gian từ tháng 11 đến tháng 4 là lý tưởng nhất để khám phá vẻ đẹp nơi đây.</p>
            <p><strong>Cách di chuyển:</strong> Du khách có thể di chuyển bằng ô tô hoặc xe máy. Từ thành phố Trà Vinh, bạn có thể đi theo quốc lộ 53 và tiếp tục theo các tuyến đường nhỏ để đến Biển Ba Động.</p>
            <div class="image-container">
                Thêm URL hình ảnh của bạn ở đây 
                <img src="<URL_HERE>" alt="Bản Đồ và Lộ Trình">
            </div>
        </div>
    </section>  -->
</main>

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
</script>

</html>