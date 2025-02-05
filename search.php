<?php
// Kullanıcıdan alınan veriyi al
$input = $_POST['input'] ?? '';

// Girdi verisini decode et
$decoded_input = urldecode($input);

// Aranacak tehlikeli içeriklerin listesi
$dangerous_patterns = [
    '/alert\([^)]*\);/i',                       // alert() çağrısı
    '/prompt\([^)]*\);/i',                      // prompt() çağrısı
    '/alert\([^)]*\)/i',                        // alert() (noktalı virgülsüz)
    '/prompt\([^)]*\)/i',                       // prompt() (noktalı virgülsüz)
    '/";%0aalert\([^)]*\);%0avar \$a="/i',       // Alert çağrısı ile zararlı kod
    '/";alert\([^)]*\);var \$a="/i',             // alert() ile değişken ataması
    '/";prompt\([^)]*\);var \$a="/i',            // prompt() ile değişken ataması
    '/";%0aalert\([^)]*\);var \$a="/i',          // %0a karakteri ile alert()
    '/erferg"; var $b = alert\([^)]*\);   ;"/i', // Özel bir alert örneği
    '/ var \$b = alert\([^)]*\)   ;"/i',         // alert() fonksiyonu içeren örnek
    '/"; \var \$b \= \alert\([^)]*\);   \;"/i',  // alert() fonksiyonu içinde \ var $b örneği
    '/var \$b = alert("1");/i',                 // Basit alert örneği
    '/";alert\([^)]*\);var \$a="/i',             // alert() ve değişken ataması
    '/";prompt\([^)]*\);var \$a="/i',            // prompt() ve değişken ataması
    '/";%0aprompt\([^)]*\);avar \$a="/i',        // %0a ile prompt() çağrısı
    '/";%0aprompt\([^)]*\);%0avar \$a="/i',      // %0a ile prompt() çağrısı
    '/";%0ajavascript:alert\([^)]*\);%0avar \$a="/i', // javascript ile alert() fonksiyonu
    '/";%0ajavascript:alert\([^)]*\);var \$a="/i',   // javascript protokolü ile alert()
    '/";%0ajavascript:prompt\([^)]*\);var \$a="/i',  // javascript protokolü ile prompt()
    '/";%0ajavascript:prompt\([^)]*\);%0avar \$a="/i',// javascript:prompt() zararlı kod
    '/";%0ajavascript:window.alert\([^)]*\);%0avar \$a="/i', // window.alert() çağrısı
    '/";%0ajavascript:window.prompt\([^)]*\);%0avar \$a="/i', // window.prompt() çağrısı
    '/";%0ajavascript:self.alert\([^)]*\);%0avar \$a="/i', // self.alert()
    '/";%0ajavascript:self.prompt\([^)]*\);%0avar \$a="/i',// self.prompt()
    '/";%0ajavascript:this.alert\([^)]*\);%0avar \$a="/i', // this.alert()
    '/";%0ajavascript:this.prompt\([^)]*\);%0avar \$a="/i', // this.prompt()
    '/";%0ajavascript:\(\(alert\)\([^)]*\)\);%0avar \$a="/i', // nested alert()
    '/";%0ajavascript:eval\(\'alert\([^)]*\)\'\);%0avar \$a="/i', // eval() ile alert()
    '/";%0ajavascript:Function\(\'alert\([^)]*\)\'\)\(\);%0avar \$a="/i', // Function() ile alert()
    '/";%0ajavascript:document.body.onclick=function\(\)\{alert\([^)]*\)\};document.body.click\(\);%0avar \$a="/i', // document.body.onclick()
];

// Tehlikeli içerik kontrolü
$found = false;
foreach ($dangerous_patterns as $pattern) {
    if (preg_match($pattern, $input)) {
        $found = true;
        break;
    }
}

// Çıktı
if ($found) {
    // Tehlikeli içerik bulunduğunda James Miller yazdır ve bir buton ekle
    echo "Hedef Kullanıcı: James Miller";
    echo '<br><button onclick="window.location.href=\'giris.php\'" style="margin-top: 20px; padding: 10px 20px; font-size: 1em; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Giriş Yap</button>';
} else {
    // Tehlikeli içerik bulunmadığında kullanıcı bulunamadı mesajı ver
    echo "Kullanıcı Bulunamadı";
}
?>
