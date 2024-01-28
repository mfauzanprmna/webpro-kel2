<?php
include "../koneksi.php";

$notification = ""; // Variabel notifikasi

// Cek apakah ada notifikasi dari parameter URL
if (isset($_GET['notification'])) {
    $notification = $_GET['notification'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomorInduk = $_POST['nomorInduk'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE NomorInduk = '$nomorInduk'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedPassword = $data["Password"];

        if (password_verify($password, $hashedPassword)) {
            session_start();

            setcookie("role", $data["Role"], time() + 3600, "/");

            $_SESSION["nomorInduk"] = $nomorInduk;
            header("Location: ../dashboard.php");
            exit();
        } else {
            $notification = "Password salah";
        }
    } else {
        if (isset($_POST['login'])) {
            $notification = "Akun tidak ditemukan";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* CSS untuk notifikasi */
        .notification {
            display: <?php echo ($notification !== "") ? 'block' : 'none'; ?>;
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            color: #48BB78;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.5s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-green-500 flex items-center justify-center h-screen">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-green-500">Sign In</h2>
        <form action="login.php" method="post">
            <label for="nomorInduk" class="block text-gray-700 text-sm font-bold mb-2">NIM/NIDN:</label>
            <input type="text" id="nomorInduk" name="nomorInduk" required
                class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-green-500 mb-4">

            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" required
                class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-green-500 mb-4">

            <button type="submit" name="login"
                class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">Login</button>
        </form>

        <!-- Notifikasi -->
        <div id="notification" class="notification">
            <?php echo $notification; ?>
        </div>

        <!-- Tombol ke register.php -->
        <div class="mt-4 text-center">
            <a href="register.php" class="text-green-500 hover:underline">Don't have an account? Register here.</a>
        </div>

        <script>
            // JavaScript untuk menampilkan notifikasi
            document.addEventListener('DOMContentLoaded', function () {
                // Ambil elemen notifikasi
                var notificationElement = document.getElementById('notification');
                
                // Tampilkan notifikasi jika pesan notifikasi tidak kosong
                if (notificationElement.innerHTML.trim() !== "") {
                    notificationElement.style.display = 'block';

                    // Sembunyikan notifikasi setelah beberapa detik
                    setTimeout(function () {
                        notificationElement.style.display = 'none';
                    }, 5000); // Notifikasi akan disembunyikan setelah 5 detik
                }
            });
        </script>
    </div>
</body>
</html>
