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
            margin-left: 20px;
            margin-right: 20px;
        }
        .highlight {
            color: #f00;
        }
            /* Cấu trúc chung của phần nội dung */
      .content-section {
          background-color: white;
          margin: 20px auto; /* Giới hạn khoảng cách bên ngoài */
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
          max-width: 1200px; /* Giới hạn chiều rộng tối đa */
      }

      /* Giới hạn chiều rộng cho trang web */
      .container {
          width: 90%; /* Căn giữa và tạo khoảng cách hai bên */
          max-width: 1200px; /* Giới hạn chiều rộng */
          margin: 0 auto; /* Căn giữa nội dung */
      }

      /* Định dạng tiêu đề */
      .content-section h2 {
          font-size: 28px;
          margin-bottom: 15px;
          color: #007bff;
      }

      /* Định dạng đoạn văn */
      .content-section p {
          font-size: 16px;
          color: #555;
          margin-bottom: 15px;
      }

      /* Định dạng hình ảnh */
      .content-section img {
          width: 100%;
          height: auto;
          margin-top: 20px;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      /* Định dạng container của hình ảnh */
      .image-container {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        flex-wrap: wrap;
        justify-content: center;
      }

      /* Hình ảnh trong container */
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
                    <form method="post" action="logout.php">
                        <button href="logout.php" type="submit" name="logout" class="dropdown-item">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <img src="images/nenn.jpg" alt="nen" id="nenn">
    <div id="header">
      <h1>Lịch sử hình thành và đặc trưng của biển Ba Động</h1>
  </div>
 <!---------------------------------------------------------------------------------------------------------------->
 <!-- Phần Hệ Sinh Thái Đặc Sắc -->
 <?php
 $sql = "SELECT * FROM baiviet";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
     if($row['tentrang']=="dacdiem"){
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

<!-- Phần Cảnh Quan Đặc Trưng
<section class="content-section">
  <div class="container">
      <h2>Cảnh Quan Đặc Trưng</h2>
      <p>Với bãi biển dài hoang sơ, Biển Ba Động mang lại một không gian thư giãn tuyệt vời cho du khách. Ngoài ra, không thể không nhắc đến những cồn cát trải dài, làn nước trong vắt cùng với những dải san hô rực rỡ màu sắc. Tất cả tạo nên một bức tranh thiên nhiên hài hòa, khiến du khách không khỏi trầm trồ trước vẻ đẹp tinh khiết nơi đây.</p>
      <div class="image-container">
          <img src="images/cang1.jpg" alt="Cảnh Biển Ba Động">
          <img src="images/cang2.jpg" alt="Cồn Cát Biển Ba Động">
      </div>
  </div>
</section>

 Phần Văn Hóa Địa Phương 
<section class="content-section">
  <div class="container">
      <h2>Văn Hóa Địa Phương</h2>
      <p>Biển Ba Động không chỉ nổi bật bởi thiên nhiên kỳ vĩ mà còn là nơi lưu giữ nhiều giá trị văn hóa độc đáo. Du khách có thể khám phá đời sống ngư dân qua các làng chài truyền thống, tìm hiểu về các lễ hội của người dân địa phương, và thưởng thức những món ăn đặc sản mang đậm hương vị vùng biển. Những yếu tố văn hóa này làm cho Biển Ba Động trở thành một điểm đến đầy hấp dẫn và đáng nhớ.</p>
      <div class="image-container">
          <img src="images/langchai1.jpg" alt="Làng Chài Biển Ba Động">
          <img src="images/monan1.jpg" alt="Lễ Hội Biển Ba Động">
      </div>
  </div>
</section>

 Phần Lịch Sử Hình Thành 
<section class="content-section" id="lich-su-hinh-thanh">
  <div class="container">
      <h2>Lịch Sử Hình Thành Biển Ba Động</h2>
      <p>Vùng biển Đông ven bờ các tỉnh Đồng bằng sông Cửu Long là vùng biển phù sa, do nhiều cửa sông lớn nhỏ đổ ra, khiến phần lớn khu vực là bãi bùn, nước không trong. Tuy nhiên, Biển Ba Động lại là một điểm khác biệt, được thiên nhiên ban tặng một bãi cát dài hơn 10 km từ ấp Nhà Mát tới ấp Cồn Trứng. Đây là khu vực hiếm hoi ở miền Tây Nam Bộ với bãi cát đẹp, nước biển khá trong vào những tháng sau Tết Nguyên Đán.</p>
      
      <img src="images/hinhsu1.jpg" alt="Lịch sử hình thành Biển Ba Động" width="100%" height="auto">
      
      <p>Các dấu tích lịch sử từ đầu thế kỷ XX cho thấy khu vực Biển Ba Động đã từng là một điểm nghỉ mát được xây dựng bởi chính quyền thực dân Pháp. Họ xây dựng khu nghỉ dưỡng và sân golf mini, tạo thành một khu vực dành cho các quan chức, giới thượng lưu của tỉnh và các khu vực lân cận. Tuy nhiên, sau chiến tranh, những công trình này không còn tồn tại, nhưng những dấu tích ấy đã để lại nhiều câu chuyện thú vị và hiện vẫn là một phần quan trọng của lịch sử địa phương.</p>

      <p>Hơn nữa, khi tỉnh Trà Vinh được tái lập vào năm 1992, Nhà nước đã đầu tư mạnh mẽ vào cơ sở hạ tầng, từ giao thông, điện lưới, đến việc bảo vệ bờ biển, khôi phục lại tiềm năng du lịch của Biển Ba Động. Những dự án phát triển này đã giúp Biển Ba Động dần trở thành điểm đến du lịch nổi bật trong khu vực Đồng bằng sông Cửu Long.</p>
      
      <img src="images/hinhsu2.jpg" alt="Di tích lịch sử Biển Ba Động" width="100%" height="auto">

      <p>Với lịch sử hình thành lâu dài và những dấu tích chiến tranh anh hùng, Biển Ba Động không chỉ thu hút du khách bởi vẻ đẹp tự nhiên mà còn bởi những câu chuyện lịch sử phong phú, tạo nên một không gian du lịch đầy ý nghĩa.</p>
  </div>
</section> -->

 
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
</script>
</html>

