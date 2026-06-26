<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>
</head>
<body>
<div class="khung-khoa-hoc">
        <h3>Danh sách khóa học</h3>
        
        <ul>
            <?php

                $danhSachKhoaHoc = ["HTML", "CSS", "JavaScript", "PHP"];

                foreach ($danhSachKhoaHoc as $monHoc) {
                    

                    if ($monHoc == "PHP") {

                        echo "<li>" . $monHoc . " - <span class='dang-hoc'>Đang học</span></li>";
                    } else {
                        echo "<li>" . $monHoc . "</li>";
                    }
                    
                }
            ?>
        </ul>
    </div>
</body>
</html>