<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurallar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image.png'); 
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            text-align: center;
            max-width: 800px;
            background: rgba(0, 0, 0, 0.5); 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .rules-list {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            text-align: left;
            list-style-type: decimal;
            padding-left: 20px;
        }

        .btn-start {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-start:hover {
            background-color: #0056b3;
        }

        #loading-screen {
            display: none; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            z-index: 9999;
        }
    </style>
</head>

<body>

    <div class="container">
        
        <div class="logo">
            <img src="/logo.png" alt="Logo"> 
        </div>

        <h1>Flag Hunter Kuralları</h1>
        <h3>Lütfen aşağıdaki kuralları dikkatlice okuyun:</h3>

        <ul class="rules-list">
            <li>Aşama : XSS zafiyetini bul ve exploit et.</li>
            <li>Aşama : SQL Injection ile kullanıcı adı ve şifre bilgisine ulaş.</li>
            <li>Aşama : Giriş yap ve Admin ol.</li>
            <li>Aşama : ZIP dosyasını indir ve şifreyi kırarak flag'e ulaş.</li>
        </ul>

        <button class="btn-start" onclick="startProcess()">Başlayalım</button>
    </div>

    
    <div id="loading-screen">
        İşlem Başlatılıyor, Lütfen Bekleyiniz...
    </div>

    <script>
        function startProcess() {

            document.getElementById('loading-screen').style.display = 'flex';

            
            setTimeout(function () {
                window.location.href = 'personel.php';
            }, 3000);
        }

        
        window.onload = function () {
            document.getElementById('loading-screen').style.display = 'none';
        };
    </script>

</body>
</html>
