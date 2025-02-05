<?php
// Kullanıcı girişi kontrolü
session_start();

// Kullanıcı bilgileri serialize edilmiş bir cookie'den okunuyor
if (isset($_COOKIE['user_data'])) {
    $user_data = unserialize(base64_decode($_COOKIE['user_data']));
} else {
    // Varsayılan kullanıcı bilgileri
    $user_data = [
        'username' => 'guest',
        'isAdmin' => false
    ];
    setcookie('user_data', base64_encode(serialize($user_data)));
}

// Yetki kontrolü
$isAdmin = $user_data['isAdmin']; // Admin yetkisi kontrolü
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Profil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 50px;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
        .profile-header h2 {
            margin-top: 20px;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .btn-download {
            background-color: #28a745;
            color: white;
        }
        .btn-download:hover {
            background-color: #218838;
        }
        .text-center {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="profile-header">
        <img src="profile.jpg" alt="Profil Resmi"> 
        <h2>James Miller</h2>
    </div>

   
    <div class="profile-info">
        <p><strong>Kullanıcı Adı:</strong> James Miller</p>
        <p><strong>Email:</strong> james.academy@insiderrs.com</p> <!-- QWxsIGFuc3dlcnMgYXJlICJpbnNpZGUiIHRoZSBxdWVzdGlvbg== -->
        <p><strong>Katılım Tarihi:</strong> 1 Ocak 2019</p>
    </div>

    <div class="text-center">
        <?php if ($isAdmin): ?>
            
            <a href="jamesmiller.zip" class="btn btn-download" download>Dosyayı İndir</a>
        <?php else: ?>
            
            <p class="text-danger">Bu dosyayı indirmek için admin yetkisine sahip olmanız gerekiyor.</p>
        <?php endif; ?>
    </div>

    
    <div class="text-center mt-4">
        <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
