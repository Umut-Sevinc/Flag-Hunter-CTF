<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Flag-Hunter CTF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flag-Hunter CTF">
    <meta name="creator" content="Umut SEVİNÇ (academy@insiderrs.com)">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        background-image: url('/image.png'); 
        background-size: cover;
        background-position: center center;
        font-family: 'Helvetica Neue', Arial, sans-serif;
      }
      .logo-left, .logo {
        position: fixed;
        z-index: 1000;
      }
      .logo-left {
        top: 10px;
        right: 10px;
      }
      .logo {
        top: 10px;
        left: 10px;  
      }
      .header-title {
        position: absolute;
        top: 20px;
        width: 100%;
        text-align: center;
        font-size: 50px; 
        font-weight: bold;
        color: #ffffff; 
        text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.6), 0 0 25px rgba(255, 255, 255, 0.3); 
      }
      .navbar {
        background: linear-gradient(90deg, #4a90e2, #007bff);
        border: none;
        border-radius: 0;
      }
      .navbar .brand {
        color: #fff;
        font-weight: bold;
      }
      .navbar .nav li a {
        color: #fff;
      }
      .container {
        background: rgba(255, 255, 255, 0.8); 
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }
      form {
        margin-bottom: 20px;
      }
      form label {
        font-weight: bold;
        color: #333;
      }
      form input[type="text"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: calc(100% - 110px);
      }
      form button {
        padding: 8px 20px;
        background-color: #007bff; 
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      form button:hover {
        background-color: #0056b3; 
      }
      footer {
        text-align: center;
        margin-top: 20px;
        color: #666;
        font-size: 14px;
      }

      .nav-btn {
        background-color: #007bff; 
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 5px;
        width: 100px;
        transition: background-color 0.3s;
      }

      .nav-btn:hover {
        background-color: #0056b3; 
      }

    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>

    <div class="header-title">XSS-Challenge</div>

    <div class="logo">
      <img src="/logo.png" alt="Logo Left" width="100">
    </div>

    <div class="logo-left">
      <img src="/logo-left.png" alt="Logo" width="100">
    </div>

    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="https://insiderrs.com/"></a>
        <div class="nav-collapse collapse"> 
          <ul class="nav">
            <li><a href="kimin.php" class="nav-btn">Exploit Sorgu</a></li>
            <li><a href="giris.php" class="nav-btn" onclick="showMessage(event)">Giriş Yap</a></li>
            <li><a href="flag_submit.php" class="nav-btn">Bayrak Sorgu</a></li>
          </ul>
        </div>
      </div>
    </div>

    <style>
      #message {
        display: none; /* Başlangıçta mesaj gizli */
        color: red;
        font-weight: bold;
      }
    </style>
    
    <script>
      function showMessage(event) {
        event.preventDefault();
        document.getElementById("message").style.display = "block";
      }
    </script>

    <div class="container">
      <form method="GET">
        <label for="name">Site İçinde Ara:</label><br>
        <input type="text" id="name" name="name" placeholder="Kelime Ara">
        <button type="submit">ARA</button>
      </form>  

      <p>ARANAN KELİME: </p>
      <script>
        var $a = "<?php echo str_replace(['<', '>'], ['&lt;', '&gt;'], str_replace('%0a', "\n", $_GET['name'] ?? '')); ?>"; 
      </script>

      <footer>
        <div id="message">Henüz bu aşamada değilsin.</div>  
        <p>&copy; Insiderrs ACADEMY 2019</p>
        <a href="https://insiderrs.com">Insiderrs.com</a> |
        <a href="kimin.php">Sorgu</a> |
        <a href="giris.php" onclick="showMessage(event)">Giriş Yap</a>
      </footer>

    </div> 

  </body>
</html>
