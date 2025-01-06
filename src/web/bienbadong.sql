-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2025 lúc 02:24 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bienbadong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `idbaiviet` int(11) NOT NULL,
  `tieudebaiviet` varchar(200) NOT NULL,
  `noidungbaiviet` text NOT NULL,
  `url_image` text NOT NULL,
  `tentrang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`idbaiviet`, `tieudebaiviet`, `noidungbaiviet`, `url_image`, `tentrang`) VALUES
(1, 'Khám phá vẻ đẹp hoang sơ của Biển Ba Động', 'Nằm cách trung tâm thành phố Trà Vinh khoảng 55 km, Biển Ba Động là một trong những bãi biển đẹp nhất miền Tây Nam Bộ. Với làn nước trong xanh, bãi cát mịn màng và những hàng dương xanh mướt, nơi đây mang đến không gian yên bình, lý tưởng để thư giãn và hòa mình vào thiên nhiên. Hãy đến với Biển Ba Động để trải nghiệm vẻ đẹp mộc mạc nhưng đầy cuốn hút!', 'images/trangchu1.jpg', 'trangchu'),
(2, 'Trải nghiệm độc đáo tại vùng biển duy nhất ở Trà Vinh', 'Không chỉ nổi tiếng bởi cảnh sắc thiên nhiên, Biển Ba Động còn hấp dẫn du khách bởi những món hải sản tươi ngon và nền văn hóa đa dạng của người dân địa phương. Đây là điểm đến hoàn hảo để thưởng thức ẩm thực, tham quan các làng chài truyền thống và tham gia các hoạt động thú vị như cắm trại, câu cá, và chèo thuyền.', 'images/trangchu2.jpg', 'trangchu'),
(3, 'Cảnh Quan', 'Với bãi biển dài miên man và làn nước trong xanh, Biển Ba Động mang đến cho du khách một không gian yên bình và tĩnh lặng. Những cơn sóng vỗ nhẹ nhàng vào bờ tạo nên một cảm giác thư thái, dễ chịu, giúp bạn quên đi mọi lo âu của cuộc sống thường nhật. Tại đây, bạn không chỉ được tận hưởng không khí trong lành mà còn có cơ hội chiêm ngưỡng những khoảnh khắc bình minh và hoàng hôn tuyệt đẹp.', 'images/images.jpg,images/images 1.jpg,images/5.jpg', 'gioithieu'),
(4, 'Hệ Sinh Thái Đặc Sắc', 'Vùng biển này được bao phủ bởi hệ sinh thái phong phú, từ các rạn san hô, thảm cỏ biển cho đến các loài động thực vật biển đa dạng. Những hệ sinh thái này không chỉ làm tăng vẻ đẹp của biển mà còn đóng vai trò quan trọng trong việc bảo vệ môi trường tự nhiên. Ngoài ra, các loài cá, tôm, và các sinh vật biển khác cũng là một phần quan trọng trong đời sống ngư dân tại Biển Ba Động.', 'images/dd.jpg,images/dd1.jpg', 'dacdiem'),
(5, 'Đặt chân đến Biển Ba Động – Thiên đường yên bình nơi miền Tây', 'Hãy lên kế hoạch cho chuyến hành trình khám phá Biển Ba Động ngay hôm nay! Chúng tôi luôn sẵn sàng cung cấp những thông tin hữu ích nhất để bạn có một chuyến đi đáng nhớ. Đừng quên mang theo máy ảnh để lưu giữ những khoảnh khắc tuyệt vời tại bãi biển này!', 'images/trangchu3.jpg', 'trangchu'),
(6, 'Khám Phá Văn Hóa Địa Phương', 'Không chỉ có cảnh biển tuyệt đẹp, Biển Ba Động còn hấp dẫn du khách bởi những nét văn hóa đặc sắc của người dân nơi đây. Bạn có thể tham gia vào các lễ hội truyền thống, thưởng thức những món ăn đặc sản, và tìm hiểu về cuộc sống của ngư dân miền biển.', 'images/trangchu4.jpg', 'trangchu'),
(7, 'Hoạt Động Nổi Bật', 'Thả mình vào làn nước trong xanh, tận hưởng sự tươi mới và mát mẻ của biển.<br>\r\nKhám phá các món hải sản tươi ngon, được đánh bắt trực tiếp từ biển.<br>\r\nDạo chơi trên những con đường làng chài, tìm hiểu về cuộc sống bình dị và nền văn hóa đặc sắc của người dân địa phương.<br>\r\nTham gia các hoạt động thể thao biển như chèo thuyền, lướt sóng, hoặc câu cá để trải nghiệm cuộc sống như một ngư dân thực thụ.<br>', 'images/dd5.jpg,images/8.jpg,images/9.jpg,images/10.jpg', 'gioithieu'),
(8, 'Thông Tin Du Lịch', 'Vị trí: Biển Ba Động tọa lạc tại xã Long Đức, huyện Trà Cú, tỉnh Trà Vinh. Từ thành phố Trà Vinh, du khách có thể di chuyển khoảng 40 km để đến được điểm đến tuyệt vời này.<br>\r\n\r\nThời gian tham quan: Biển Ba Động có thể tham quan quanh năm, nhưng khoảng thời gian từ tháng 11 đến tháng 4 là lý tưởng nhất để khám phá vẻ đẹp nơi đây.<br>\r\n\r\nCách di chuyển: Du khách có thể di chuyển bằng ô tô hoặc xe máy. Từ thành phố Trà Vinh, bạn có thể đi theo quốc lộ 53 và tiếp tục theo các tuyến đường nhỏ để đến Biển Ba Động.<br>', 'images/images 3.jpg,images/images 4.jpg', 'gioithieu'),
(9, 'Cảnh Quan Đặc Trưng', 'Với bãi biển dài hoang sơ, Biển Ba Động mang lại một không gian thư giãn tuyệt vời cho du khách. Ngoài ra, không thể không nhắc đến những cồn cát trải dài, làn nước trong vắt. Tất cả tạo nên một bức tranh thiên nhiên hài hòa, khiến du khách không khỏi trầm trồ trước vẻ đẹp tinh khiết nơi đây.', 'images/dd2.jpg,images/images 1.jpg', 'dacdiem'),
(10, 'Văn Hóa Địa Phương', 'Biển Ba Động không chỉ nổi bật bởi thiên nhiên kỳ vĩ mà còn là nơi lưu giữ nhiều giá trị văn hóa độc đáo. Du khách có thể khám phá đời sống ngư dân qua các làng chài truyền thống, tìm hiểu về các lễ hội của người dân địa phương, các làng nghề khác tại đây, và thưởng thức những món ăn đặc sản mang đậm hương vị vùng biển. Những yếu tố văn hóa này làm cho Biển Ba Động trở thành một điểm đến đầy hấp dẫn và đáng nhớ.', 'images/images1.jpg,images/images2.jpg,images/images3.jpg', 'dacdiem'),
(11, 'Lịch Sử Hình Thành Biển Ba Động', 'Vùng biển Đông ven bờ các tỉnh Đồng bằng sông Cửu Long là vùng biển phù sa, do nhiều cửa sông lớn nhỏ đổ ra, khiến phần lớn khu vực là bãi bùn, nước không trong. Tuy nhiên, Biển Ba Động lại là một điểm khác biệt, được thiên nhiên ban tặng một bãi cát dài hơn 10 km từ ấp Nhà Mát tới ấp Cồn Trứng. Đây là khu vực hiếm hoi ở miền Tây Nam Bộ với bãi cát đẹp, nước biển khá trong vào những tháng sau Tết Nguyên Đán.<br>Các dấu tích lịch sử từ đầu thế kỷ XX cho thấy khu vực Biển Ba Động đã từng là một điểm nghỉ mát được xây dựng bởi chính quyền thực dân Pháp. Họ xây dựng khu nghỉ dưỡng và sân golf mini, tạo thành một khu vực dành cho các quan chức, giới thượng lưu của tỉnh và các khu vực lân cận. Tuy nhiên, sau chiến tranh, những công trình này không còn tồn tại, nhưng những dấu tích ấy đã để lại nhiều câu chuyện thú vị và hiện vẫn là một phần quan trọng của lịch sử địa phương.<br>\r\n\r\nHơn nữa, khi tỉnh Trà Vinh được tái lập vào năm 1992, Nhà nước đã đầu tư mạnh mẽ vào cơ sở hạ tầng, từ giao thông, điện lưới, đến việc bảo vệ bờ biển, khôi phục lại tiềm năng du lịch của Biển Ba Động. Những dự án phát triển này đã giúp Biển Ba Động dần trở thành điểm đến du lịch nổi bật trong khu vực Đồng bằng sông Cửu Long.<br>Với lịch sử hình thành lâu dài và những dấu tích chiến tranh anh hùng, Biển Ba Động không chỉ thu hút du khách bởi vẻ đẹp tự nhiên mà còn bởi những câu chuyện lịch sử phong phú, tạo nên một không gian du lịch đầy ý nghĩa.\r\n\r\n', 'images/5.jpg,images/dd5.jpg,images/2.jpg,images/7.jpg', 'dacdiem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `idfb` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`idfb`, `name`, `email`, `rating`, `message`, `created_at`, `user_id`) VALUES
(8, 'gjfu', 'dffgd@gmail.com', 1, 'jytiuy9', '2024-12-29 03:12:50', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `idposts` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$UfrzZ2l9gXnm0K55G2pCbOXxBBAE9Ll2aqgh2YqKWJw4WQEDDs3/G'),
(2, 'sad', '$2y$10$jkQdumnCUZyA6khf7SQLlOiA3sxjIYBAfQtIc4IF42y8SiZ7YZoaW');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`idbaiviet`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`idfb`),
  ADD KEY `fk_feedback_user` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idposts`),
  ADD KEY `fk_user` (`user_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `idbaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `idfb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `idposts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedback_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
