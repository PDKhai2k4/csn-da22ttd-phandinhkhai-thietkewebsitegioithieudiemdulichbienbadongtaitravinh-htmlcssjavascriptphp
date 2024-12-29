<?php
session_start();
require_once 'db_connect.php';

$error = ""; // Khai báo biến lỗi

// Kiểm tra nếu người dùng gửi form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kiểm tra nếu thông tin người dùng đã được nhập đầy đủ
    if (empty($username) || empty($password)) {
        $error = "Vui lòng nhập tên người dùng và mật khẩu!";
    } else {
        // Kiểm tra tài khoản trong cơ sở dữ liệu
        $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['iduser'];
                $_SESSION['username'] = $user['name'];
                header("Location: welcome.php"); // Redirect sau khi đăng nhập thành công
                exit;
            } else {
                $error = "Mật khẩu sai!";
            }
        } else {
            $error = "Tài khoản không tồn tại, vui lòng đăng ký!";
        }
    }
}

// Kiểm tra nếu người dùng gửi form đăng ký
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp không
    if ($password !== $confirm_password) {
        $error = "Mật khẩu không khớp, vui lòng thử lại.";
    } else {
        // Kiểm tra tài khoản đã tồn tại trong cơ sở dữ liệu chưa
        $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute([$username]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $error = "Tài khoản đã tồn tại, vui lòng chọn tên khác.";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thực hiện lưu tài khoản mới vào cơ sở dữ liệu
            $stmt = $pdo->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashedPassword]);

            // Lưu thông tin người dùng vào session và chuyển hướng
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['username'] = $username;
            header("Location: welcome.php"); // Redirect sau khi đăng ký và đăng nhập thành công
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button.btn-login, a.btn-register {
            width: 48%;
            padding: 12px;
            font-size: 16px;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        button.btn-login {
            background-color: #4CAF50;
            color: white;
        }

        button.btn-login:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        a.btn-register {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 12px;
            font-size: 16px;
            text-align: center;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }

        a.btn-register:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Responsive for smaller screens */
        @media (max-width: 400px) {
            .button-group {
                flex-direction: column;
            }
            button.btn-login, a.btn-register {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required placeholder="Nhập tên người dùng">
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu">
            </div>
            <div class="input-group">
                <input type="checkbox" id="showPassword" onclick="togglePassword()"> Hiển thị mật khẩu
            </div>
            <div class="button-group">
                <button type="submit" name="login" class="btn-login">Đăng nhập</button>
                <a href="register.php" class="btn-register">Đăng ký</a>
            </div>
        </form>
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var checkbox = document.getElementById("showPassword");

            // Kiểm tra trạng thái của checkbox để thay đổi type của input mật khẩu
            if (checkbox.checked) {
                passwordField.type = "text";  // Hiện mật khẩu
            } else {
                passwordField.type = "password";  // Ẩn mật khẩu
            }
        }
    </script>
</body>
</html>
