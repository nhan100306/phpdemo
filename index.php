<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chào sinh viên</title>
</head>
<body>

    <?php

        $hoTen = "Nguyễn Thanh Nhàn";
        $tuoi = 20; 
        $nganhHoc = "Lập trình Web";
        $email = "nguyenthanhjhan.1999@gmail.com";
    ?>

    <fieldset>
        <legend><h3>Trang chào sinh viên</h3></legend>
        <p><b>Họ tên:</b> <?php echo $hoTen; ?></p>
        <p><b>Tuổi:</b> <?php echo $tuoi; ?></p>
        <p><b>Ngành học:</b> <?php echo $nganhHoc; ?></p>
        <p><b>Email:</b> <?php echo $email; ?></p>

        <hr> <?php

            if ($tuoi >= 18) {
                echo "<p>Đủ tuổi học đại học</p>";
            } else {
                echo "<p>Chưa đủ tuổi học đại học</p>";
            }
        ?>
    </fieldset>

</body>
</html>