<?php
include 'config.php'; // Include file konfigurasi untuk koneksi ke database
session_start(); // Mulai sesi

// Periksa jika pengguna sudah login, maka arahkan ke halaman berhasil_login.php
if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
    exit();
}

// Proses formulir pendaftaran ketika tombol submit ditekan
if (isset($_POST['submit'])) {
    // Ambil data dari formulir dan lakukan pembersihan input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Password tidak di-hash

    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Pengecekan apakah email berakhiran @gmail.com
    if (!preg_match("/@gmail\.com$/", $email)) {
        echo "<script>alert('Maaf, hanya email dengan akhiran Gmail yang diizinkan untuk registrasi!')</script>";
    } else {
        // Query untuk memeriksa apakah email dan username sudah terdaftar sebelumnya
        $check_email_query = "SELECT * FROM users WHERE email = '$email'";
        $check_username_query = "SELECT * FROM users WHERE username = '$username'";

        $email_result = mysqli_query($conn, $check_email_query);
        $username_result = mysqli_query($conn, $check_username_query);

        if (mysqli_num_rows($email_result) > 0 || mysqli_num_rows($username_result) > 0) {
            echo "<script>alert('Email atau username sudah terdaftar. Silakan gunakan yang lain!')</script>";
        } else {
            // Jika semua validasi berhasil, lanjutkan dengan pendaftaran
            // Query untuk menambahkan data pengguna baru ke database
            $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hash')";

            // Jalankan query
            if (mysqli_query($conn, $sql)) {
                // Jika pendaftaran berhasil, arahkan pengguna ke halaman berhasil_login.php
                header("Location: beranda.php");
                exit();
            } else {
                // Jika terjadi kesalahan, tampilkan pesan error
                echo "<script>alert('Registrasi gagal. Silakan coba lagi!')</script>";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-300 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
        <form action="" method="POST" class="space-y-4" onsubmit="return validateForm()">
            <h1 class="text-3xl font-semibold text-center">Registrasi</h1>
            <div class="flex flex-col space-y-1">
                <input type="email" placeholder="Email" name="email" required
                    class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <div class="flex flex-col space-y-1">
                <input type="text" placeholder="Username (Maksimal 25 karakter)" name="username" maxlength="25" required
                    class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <div class="flex flex-col space-y-1">
                <input type="password" placeholder="Password" id="password" name="password" required
                    class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <div class="flex flex-col space-y-1 relative">
                <input type="password" placeholder="Konfirmasi Password" id="confirm_password" name="confirm_password" required
                    class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-purple-500">
                <span id="message" class="absolute top-full left-0 text-red-500"></span>
            </div>
            <div class="flex flex-col space-y-1">
                <button type="submit" name="submit"
                    class="bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                    Registrasi
                </button>
            </div>
            <p class="text-center text-sm text-gray-600">Sudah punya akun? <a href="login.php" class="text-purple-600">Login</a></p>
        </form>
    </div>

    <script>
        // Fungsi untuk memvalidasi apakah password dan konfirmasi password sama
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var message = document.getElementById("message");

            if (password != confirm_password) {
                message.innerHTML = "Password tidak cocok!";
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>
