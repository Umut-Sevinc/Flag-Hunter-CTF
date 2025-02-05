<?php
session_start();
session_unset(); // Oturum değişkenlerini temizler
session_destroy(); // Oturumu sonlandırır
header('Location: giris.php'); // Kullanıcıyı giriş sayfasına yönlendir
exit();
?>
