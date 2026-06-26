<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký cơ bản</title>
    <style>
        /* CSS cơ bản cho khung và các ô nhập liệu */
        .khung-form {
            border: 1px solid #333; 
            padding: 20px;           
            width: 350px;            
            font-family: Arial, sans-serif;
        }
        .form-group {
            margin-bottom: 15px; 
        }
   
        .loi-nhap-lieu {
            color: red;
            font-size: 13px;
            margin-top: 4px;
            display: block;
        }

        .thong-bao-thanh-cong {
            color: green;
            font-weight: bold;
            padding: 10px;
            background-color: #e6f4ea;
            border-left: 4px solid green;
            margin-bottom: 20px;
        }
        input {
            width: 93%;
            padding: 6px;
        }
        button {
            padding: 8px 15px;
            cursor: pointer;
            color: #fefeff;
            background-color: #2f16be;
        }
    </style>
</head>
<body>
    <div class="khung-form">
        <h3>Đăng ký tài khoản</h3>

        <?php
            // Khởi tạo các biến để lưu dữ liệu
            $hoTen = $email = $matKhau = "";
            
            // Thay vì dùng mảng chung, ta tách riêng thông báo lỗi cho từng ô
            $loiHoTen = $loiEmail = $loiMatKhau = "";
            $dangKyThanhCong = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $hoTen = $_POST["hoten"];
                $email = $_POST["email"];
                $matKhau = $_POST["matkhau"]; 

                // 1. Kiểm tra họ tên
                if (empty(trim($hoTen))) {
                    $loiHoTen = "Họ tên không được để trống.";
                }

                // 2. Kiểm tra email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $loiEmail = "Email không hợp lệ.";
                }

                // 3. Kiểm tra mật khẩu
                if (strlen($matKhau) < 6) {
                    $loiMatKhau = "Mật khẩu phải có ít nhất 6 ký tự.";
                }

                // Nếu cả 3 biến lỗi đều trống -> Đăng ký thành công
                if (empty($loiHoTen) && empty($loiEmail) && empty($loiMatKhau)) {
                    $dangKyThanhCong = true;
                }
            }
        ?>

        <?php if ($dangKyThanhCong) { ?>
            <div class="thong-bao-thanh-cong">
                Đăng ký thành công!
                <br><br>
                <span style="font-weight: normal; color: #333;">
                    <b>Họ tên đã đăng ký:</b> <?php echo htmlspecialchars($hoTen); ?><br>
                    <b>Email đã đăng ký:</b> <?php echo htmlspecialchars($email); ?>
                </span>
            </div>
            <hr style="margin-bottom: 20px;">
        <?php 
        
            $hoTen = $email = $matKhau = ""; 
        } 
        ?>

        <form method="POST" action="">
            
            <div class="form-group">
                <label><b>Họ tên:</b></label><br>
                <input type="text" name="hoten" value="<?php echo htmlspecialchars($hoTen); ?>">
                <?php if (!empty($loiHoTen)) { ?>
                    <span class="loi-nhap-lieu"><?php echo $loiHoTen; ?></span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label><b>Email:</b></label><br>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <?php if (!empty($loiEmail)) { ?>
                    <span class="loi-nhap-lieu"><?php echo $loiEmail; ?></span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label><b>Mật khẩu:</b></label><br>
                <input type="password" name="matkhau">
                <?php if (!empty($loiMatKhau)) { ?>
                    <span class="loi-nhap-lieu"><?php echo $loiMatKhau; ?></span>
                <?php } ?>
            </div>

            <button type="submit">Đăng ký</button>
        </form>

    </div>
</body>
</html>