<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Password dengan JavaScript</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        input, button { padding: 10px; margin: 5px; }
        .result { margin-top: 20px; font-weight: bold; color: green; word-break: break-all; }
    </style>
</head>
<body>

    <h2>Hash Password dengan JavaScript</h2>
    <input type="text" id="password" placeholder="Masukkan Password" required>
    <button onclick="hashPassword()">Hash</button>

    <div id="hasil" class="result"></div>

    <script>
        async function hashPassword() {
            var password = document.getElementById("password").value;

            if (password.trim() === "") {
                alert("Password tidak boleh kosong!");
                return;
            }

            // Konversi password ke dalam bentuk ArrayBuffer
            const encoder = new TextEncoder();
            const data = encoder.encode(password);

            // Hash menggunakan SHA-256
            const hashBuffer = await crypto.subtle.digest('SHA-256', data);

            // Konversi hash ke bentuk string HEX
            const hashArray = Array.from(new Uint8Array(hashBuffer));
            const hashHex = hashArray.map(byte => byte.toString(16).padStart(2, '0')).join('');

            // Tampilkan hasil hash
            document.getElementById("hasil").innerHTML = "Hashed Password:<br><code>" + hashHex + "</code>";
        }
    </script>

</body>
</html>
