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
        /* Kiểu chung cho phần nội dung */
.content-section {
  display: flex;
  flex-direction: column;
  gap: 40px; /* Khoảng cách giữa các khối */
  padding: 20px;
}

.content-block {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-left:20px;
}

.content-block.reverse {
  flex-direction: row-reverse; /* Đảo vị trí văn bản và hình ảnh */
  margin-right:20px;
}
.content-text {
  flex: 1;
}

.content-text h2 {
  font-size: 24px;
  color: #333;
  margin-bottom: 10px;
}

.content-text p {
  font-size: 16px;
  color: #555;
  line-height: 1.6;
}

.content-image {
  flex: 1;
  text-align: center;
}

.content-image img {
  width: 100%;
  max-width: 400px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
@media (max-width: 768px) {
  .content-block {
    flex-direction: column;
    text-align: center;
  }
  .content-block.reverse {
    flex-direction: column; /* Đảm bảo đảo vị trí cũng xếp thẳng hàng */
  }
}
/*------------------------------------------------------------------------*/

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
 <!---------------------------------------------------------------------------------------------------------------------------------------> 
    <section id="slider">
        <div class="aspect-ratio-169">
            <img src="images/nen.jpg">
            <img src="images/nen1.jpg">
            <img src="images/nen2.jpg">
            <img src="images/nen3.jpg">
            <img src="images/nen4.jpg">
            <img src="images/nen5.jpg">
            <img src="images/nen6.jpg">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
    <br><br>
    <section class="content-section">
        <!-- Đoạn 1 -->
         <?php
         $sql = "SELECT * FROM baiviet";
         $result = $conn->query($sql);
         $n=1;
         if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
             $n++;
             if($row['tentrang']=="trangchu"){
         ?>
        <div class="content-block<?php if($n%2==0){echo '';}if($n%2!=0){echo ' reverse';} ?>">

          <div class="content-text">
            <h2><?php echo $row['tieudebaiviet'] ?></h2>
            <p><?php echo $row['noidungbaiviet'] ?></p>
          </div>
          <div class="content-image">
            <img src="<?php echo $row['url_image'] ?>" alt="Biển Ba Động">
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
 <!-----------------------------------------------------------------------------------------------------------------------------------> 
    
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
 <!------------------------------------------------------------------------------------------------------------------------------------>
 
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
    //console.log(imgPosition)
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
