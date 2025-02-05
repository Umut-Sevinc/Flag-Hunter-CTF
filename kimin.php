<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Kontrol</title>
    <style>
        /* Genel stil */
        body {
            font-family: Arial, sans-serif;
            background-image: url('image.png'); /* Arka plan görseli */
            background-size: cover;
            background-position: center center;
            color: #ffffff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            font-size: 2.5em;
            margin: 0;
            padding-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin: 0;
            padding-bottom: 30px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #ff7f50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff5722;
        }

        .result {
            margin-top: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }

        /* Dinamik olarak beliren butonun stili */
        #redirectButton {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #redirectButton:hover {
            background-color: #218838;
        }

        /* Geri düğmesinin stili */
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

        /* Logo stili */
        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <button class="back-button" onclick="window.history.back();">Geri</button>

    <div class="container">
        <img src="logo.png" alt="Logo" class="logo"> 
        <h1>Bulduğun Exploiti Gir</h1>
        <p>Size Bir Hediyemiz Var.</p>
        
        
        <form id="checkForm">
            <input type="text" id="inputText" name="input" placeholder="Exploit Input" required>
            <button type="submit">Kontrol Et</button>
        </form>

        <div id="result" class="result">
            
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#checkForm').submit(function(e) {
                e.preventDefault(); 

                
                var inputText = $('#inputText').val();

                
                $.ajax({
                    url: 'search.php',
                    type: 'POST',
                    data: { input: inputText },
                    success: function(response) {
                        
                        $('#result').html(response);

                        
                        if (response.trim() === "James Miller") {
                            const redirectButton = ` 
                                <button id="redirectButton" onclick="window.location.href='giris.php';">
                                    Giriş Yap
                                </button>`;
                            $('#result').append(redirectButton);
                        }
                    },
                    error: function() {
                        $('#result').html('Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
        });
    </script>
</body>
</html>
