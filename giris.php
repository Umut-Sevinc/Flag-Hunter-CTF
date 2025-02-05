<?php
session_start(); // Oturum başlat

$error_message = ''; // Hata mesajı
$success_message = ''; // Başarı mesajı

// Kullanıcı adı ve şifreyi al
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Örnek kullanıcı adı ve şifre
    $valid_username = 'james';
    $valid_password = 'j.miller1990';

    // SQL hatası tespiti (tek tırnak ve OR kullanımı)
    if (strpos($username, "'") !== false || strpos($password, "'") !== false) {
        // Eğer tek tırnak ('') veya OR kelimesi bulunursa, SQL hatası mesajı döndür
        $error_message = "SQL hatası: Syntax error or access violation. Incorrect usage of \' or OR in query.";
    } 
    // SQL enjeksiyonu tespiti (UNION SELECT, AND 1=1 gibi)
    elseif (preg_match('/(UNION\s+SELECT|AND\s+1=1|SELECT\s+FROM\s+information_schema|SELECT\s+\*\s+FROM|;--|\/\*|DROP\s+TABLE|--\+|#|XP_CMDSHELL|BASE64_DECODE|SELECT\s+INTO\s+OUTFILE|CHAR\(|SLEEP|BENCHMARK)/i', $username) || preg_match('/(UNION\s+SELECT|AND\s+1=1|SELECT\s+FROM\s+information_schema|SELECT\s+\*\s+FROM|;--|\/\*|DROP\s+TABLE|--\+|#|XP_CMDSHELL|BASE64_DECODE|SELECT\s+INTO\s+OUTFILE|CHAR\(|SLEEP|BENCHMARK)/i', $password)) {
        // SQL enjeksiyonu tespit edilirse, birçok kullanıcı adı ve şifre içeren tabloyu simüle et
        $success_message = '
        <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; color: #fff; font-size: 14px; width: 100%; background-color: #333;">
            <thead>
                <tr>
                    <th>Kullanıcı Adı</th>
                    <th>Şifre</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . censor_username('a*min') . '</td>
                    <td>In51d3r55</td>
                </tr>
                <tr>
                    <td>' . censor_username('m*ria') . '</td>
                    <td>mylifebeauty</td>
                </tr>
                <tr>
                    <td>' . censor_username('j*mes') . '</td>
                    <td>j.miller1990</td>
                </tr>
                <tr>
                    <td>' . censor_username('r*ot') . '</td>
                    <td>rootpassword</td>
                </tr>
                <tr>
                    <td>' . censor_username('t*st') . '</td>
                    <td>test1234</td>
                </tr>
            </tbody>
        </table>';
    }

    // Normal giriş denemesi
    if ($username === $valid_username && $password === $valid_password) {
        // Başarılı giriş, oturum başlat ve kullanici.php sayfasına yönlendir
        $_SESSION['username'] = $username; // Oturumu başlat
        header('Location: kullanici.php');
        exit(); // Yönlendirmeden sonra scripti durdur
    } else {
        // Hatalı giriş
        if (empty($error_message) && empty($success_message)) {
            $error_message = "Kullanıcı adı veya şifre hatalı!";
        }
    }
}

// Silüet işlemi yapılmış kullanıcı adını döndüren fonksiyon
function censor_username($username) {
    $masked_username = '';
    for ($i = 0; $i < strlen($username); $i++) {
        // İlk iki harfi bırak, geri kalanını yıldızla maskelenmiş yap
        if ($i < 2) {
            $masked_username .= $username[$i];
        } else {
            $masked_username .= '*';
        }
    }
    return $masked_username;
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image.png'); /* Arka plan görseli */
            background-size: cover; /* Görselin tüm sayfayı kaplaması için */
            background-position: center center; /* Görselin merkezi hizalanacak */
            background-attachment: fixed; /* Görselin sayfa kaydırıldığında sabit kalmasını sağlar */
            padding-top: 50px;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            width: 80%;
            max-width: 600px;
        }

        .form-group label {
            font-weight: bold;
            color: #fff; /* Etiket metni beyaz */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center {
            font-size: 14px;
            color: #ddd;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px; /* Logo boyutu */
            height: auto;
        }

        /* Giriş formunun altında bir link stili */
        .text-center a {
            color: #00b0ff;
        }

        .text-center a:hover {
            color: #0094cc;
        }

        /* Hata mesajlarını belirgin hale getirmek için stil */
        .error-message {
            color: red;
            font-weight: bold;
        }

        .success-message {
            color: green;
            font-weight: bold;
        }

        /* Geri düğmesinin stilini ekleyelim */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #ff7f50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #ff5722;
        }
    </style>
</head>

<body>

   
    <button class="back-button" onclick="window.location.href='/personel.php'">Geri</button>

    <div class="container">
        
        <div class="logo">
            <img src="/logo.png" alt="Logo"> 
        </div>
        
        <h3 class="text-center">Personel Giriş</h3>

        
        <?php
        if ($error_message) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        if ($success_message) {
            echo '<p class="success-message">' . $success_message . '</p>';
        }
        ?>

        <!-- Giriş Formu -->
        <form method="POST">
            <div class="form-group">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı Adı" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Şifre" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
        </form>

        
        <div class="text-center">
            <p>Hesabınız yok mu? <a href="#">Kayıt Olun</a></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
