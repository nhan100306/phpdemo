<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website dùng Include</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9; }
        header { 
            background-color: #333; 
            color: white; 
            padding: 15px 30px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .logo { font-size: 24px; font-weight: bold; color: #ff9900; }
        nav a { 
            color: white; 
            text-decoration: none; 
            margin-left: 20px; 
            font-size: 16px;
        }
        nav a:hover { text-decoration: underline; color: #ff9900; }
        .noi-dung-chinh { padding: 30px; min-height: 300px; background-color: white; margin: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        footer { background-color: #ddd; text-align: center; padding: 15px; margin-top: auto; }
    </style>
</head>
<body>

    <header>
        <div class="logo">MyLogo</div>
        <nav>
            <a href="index.php">Trang chủ</a>
            <a href="about.php">Giới thiệu</a>
        </nav>
    </header>

    <div class="noi-dung-chinh">