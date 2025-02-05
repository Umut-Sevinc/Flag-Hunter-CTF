<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$successMessage = "";
$errorMessage = "";

// Flag verisi gönderildiğinde işleme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['flag'])) {
        $flag = $_POST['flag'];

        // Eğer doğru flag girildiyse tebrik mesajını hazırla
        if ($flag === "FLAG{TEBRİKLER_CTF'İ_BİTİRDİN}") {
            $successMessage = "<div class='success-message'>🎉 Tebrikler! CTF'i başarıyla tamamladınız. 🎉</div>";
        } else {
            $errorMessage = "<div class='error-message'>❌ Yanlış flag, tekrar deneyin! ❌</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flag Gönderme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image.png');
            background-size: cover;
            color: white;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #ff7f50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .back-button:hover {
            background-color: #ff5722;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success-message {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #4CAF50;
            animation: fadeIn 1s ease-in-out, scaleUp 0.5s ease-in-out;
        }
        .error-message {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #ff3333;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scaleUp {
            from { transform: scale(0.8); }
            to { transform: scale(1); }
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Flag Gönder</h2>
        <form method="POST">
            <label for="name">İsim:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="surname">Soyisim:</label>
            <input type="text" id="surname" name="surname" required><br>
            <label for="flag">Flag:</label>
            <input type="text" name="flag" required><br>
            <button class="back-button" onclick="history.back()">Geri</button>
            <button type="submit">Gönder</button>
        </form>
        <?php echo $successMessage; ?>
        <?php echo $errorMessage; ?>
    </div>
</body>
</html>
