<?php
session_start(); // Mulai sesi, ini diperlukan jika Anda ingin menyimpan sesi login

include 'config.php'; // Include file konfigurasi database


// Cek apakah session username sudah diset, jika iya redirect ke beranda.php
if (isset($_SESSION['username'])) {
    header('Location: beranda.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $hashed_password = $row['password'];
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header('Location: beranda.php');
            exit();
        } else {
        }
    } else {
    }
}


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // Function untuk menampilkan pesan kesalahan dalam bentuk popup
        function showError(errorMessage) {
            alert(errorMessage);
        }
    </script>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-300 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginForm"
            class="space-y-4">
            <div class="flex flex-col space-y-1">
                <input type="text" name="username" id="username" placeholder="Username"
                    class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-purple-500"
                    required>
            </div>
            <div class="flex flex-col space-y-1">
                <input type="password" name="password" id="password" placeholder="Password"
                    class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-purple-500"
                    required>
            </div>
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input type="checkbox" name="remember_me" id="remember_me" class="mr-2">
                    <span class="text-sm">Remember Me</span>
                </label>
                <a href="lupa_sandi.php" class="text-sm text-purple-600">Lupa Sandi?</a>
            </div>
            <button type="submit"
                name="login" class="bg-purple-600  text-white py-2 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 w-full">
                Login
            </button>
            <div class="text-center">
                <a href="registrasi.php" class="text-sm text-purple-600">Belum punya akun? Daftar disini</a>
            </div>
        </form>
        <?php
        // Menampilkan pesan kesalahan jika login gagal
        if (isset($error_message)) {
            // Memanggil JavaScript untuk menampilkan pesan kesalahan dalam bentuk popup
            echo '<script>showError("' . $error_message . '");</script>';
        }
        ?>
    </div>

    
</body>

<!-- ... (remaining code) ... -->

</html>