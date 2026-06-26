<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Profile App</title>
    <style>
        /* Canh giữa toàn bộ trang */
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }

        /* Khung chứa Form hoặc Card */
        .container {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 400px;
        }

        /* --- CSS CHO FORM --- */
        .form-group { margin-bottom: 15px; }
        .form-group label { font-weight: bold; display: block; margin-bottom: 5px; }
        input[type="text"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background-color: #218838; }
        .loi-nhap-lieu { color: red; font-size: 13px; display: block; margin-top: 4px; }

        /* --- CSS CHO PROFILE CARD --- */
        .profile-card { text-align: center; }
        .profile-card h2 { color: #333; margin-bottom: 5px; }
        .profile-card p { color: #555; margin: 5px 0; }
        .danh-sach-ky-nang {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap; /* Cho phép rớt dòng nếu nhiều kỹ năng */
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
        }
        .ky-nang-tag {
            background-color: #e7f3fe;
            color: #0d82df;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            border: 1px solid #b6d4fe;
        }
        .nut-quay-lai {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .nut-quay-lai:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="container">
        <?php

            $hoTen = $email = $nganhHoc = $kyNang = "";
            $loiHoTen = $loiEmail = $loiNganhHoc = $loiKyNang = "";
            $hienThiProfile = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $hoTen = $_POST["hoten"];
                $email = $_POST["email"];
                $nganhHoc = $_POST["nganhhoc"];
                $kyNang = $_POST["kynang"];

                // Validate dữ liệu
                if (empty(trim($hoTen))) $loiHoTen = "Họ tên không được để trống.";
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $loiEmail = "Email không hợp lệ.";
                if (empty(trim($nganhHoc))) $loiNganhHoc = "Ngành học không được để trống.";
                if (empty(trim($kyNang))) $loiKyNang = "Vui lòng nhập ít nhất 1 kỹ năng.";

                if (empty($loiHoTen) && empty($loiEmail) && empty($loiNganhHoc) && empty($loiKyNang)) {
                    $hienThiProfile = true;
                }
            }
        ?>

        <?php if ($hienThiProfile) { ?>
            <div class="profile-card">
                <h2><?php echo htmlspecialchars($hoTen); ?></h2>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Ngành học:</strong> <?php echo htmlspecialchars($nganhHoc); ?></p>
                
                <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
                
                <h3>Kỹ năng của tôi</h3>
                <ul class="danh-sach-ky-nang">
                    <?php
                        // DÙNG EXPLODE: Cắt chuỗi kỹ năng thành mảng dựa vào dấu phẩy
                        $mangKyNang = explode(',', $kyNang);
                        
                        // DÙNG FOREACH: Lặp qua từng phần tử của mảng để in ra thẻ <li>
                        foreach ($mangKyNang as $kn) {
                            $kn = trim($kn); // Cắt bỏ khoảng trắng thừa ở 2 đầu chữ
                            if (!empty($kn)) {
                                // Luôn dùng htmlspecialchars để chống hack XSS
                                echo "<li class='ky-nang-tag'>" . htmlspecialchars($kn) . "</li>";
                            }
                        }
                    ?>
                </ul>

                <a href="" class="nut-quay-lai">← Tạo Profile mới</a>
            </div>

        <?php } else { ?>
            <h2 style="text-align: center; margin-top: 0;">Tạo Profile</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label>Họ tên:</label>
                    <input type="text" name="hoten" value="<?php echo htmlspecialchars($hoTen); ?>" placeholder="VD: Nguyễn Văn A">
                    <?php if (!empty($loiHoTen)) echo "<span class='loi-nhap-lieu'>$loiHoTen</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="VD: email@example.com">
                    <?php if (!empty($loiEmail)) echo "<span class='loi-nhap-lieu'>$loiEmail</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Ngành học:</label>
                    <input type="text" name="nganhhoc" value="<?php echo htmlspecialchars($nganhHoc); ?>" placeholder="VD: Lập trình Web">
                    <?php if (!empty($loiNganhHoc)) echo "<span class='loi-nhap-lieu'>$loiNganhHoc</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Kỹ năng (cách nhau bằng dấu phẩy):</label>
                    <input type="text" name="kynang" value="<?php echo htmlspecialchars($kyNang); ?>" placeholder="VD: HTML, CSS, PHP, MySQL">
                    <?php if (!empty($loiKyNang)) echo "<span class='loi-nhap-lieu'>$loiKyNang</span>"; ?>
                </div>

                <button type="submit">Hiển thị Profile</button>
            </form>
        <?php } ?>

    </div>
</body>
</html>