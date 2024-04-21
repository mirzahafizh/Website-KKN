<?php
session_start(); 
include 'config.php';

// Proses logout ketika tombol logout ditekan
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();
    // Hancurkan sesi
    session_destroy();
    // Redirect ke halaman login.php
    header("Location: login.php");
    exit();
}
// Inisialisasi variabel untuk menentukan apakah pengguna sudah login atau belum
$menu = '';

// Cek apakah session username sudah diset, jika iya, tampilkan menu user
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $menu .= '
        <div class="relative group">
            <a href="#" class="text-white hover:text-gray-300">' . $username . '</a>
            <!-- Dropdown Menu for User -->
            <div class="absolute hidden group-hover:block dropdown-menu top-full md:left-[-65px] left-[-20px] bg-green-700   text-white w-[120px] ">
                <a href="dashboard.php" class="block hover:bg-green-500 p-4 mt-2">Dashboard</a>
                <form action="" method="post">
                    <button type="submit" name="logout"
                        class="p-4 text-left hover:bg-green-500 w-full text-white outline-none">Logout</button>
                </form>
            </div>
        </div>';
} else {
    // Jika belum login, tampilkan menu login
    $menu .= '<a href="login.php" class="text-white hover:text-gray-300">Login</a>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Artikel - Hutan Lindung Sungai Wain</title>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-green-700 font-serif p-4 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Website Name -->
        <div class="text-white font-bold text-xl">HLSW</div>

        <!-- Navbar Links -->
        <div class="hidden md:flex space-x-10">
            <a href="beranda.php" class="text-white hover:text-gray-300">About</a>
            <a href="artikel.php" class="text-white hover:text-gray-300">Article</a>
            <a href="flora.php" class="text-white hover:text-gray-300">Flora</a>
            <a href="fauna.php" class="text-white hover:text-gray-300">Fauna</a>


            <!-- Menu Login/User -->
            <?php echo $menu; ?>
        </div>

        <!-- Responsive Dropdown for Small Screens -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="mobile-menu" class="hidden absolute top-14 right-0 bg-green-700 text-white p-4 shadow-md w-full md:w-auto">
                <a href="index.html" class="block py-2">About</a>
                <a href="artikel.html" class="block py-2">Article</a>
                <a href="#" class="block py-2">Gallery</a> <!-- Move this line here -->
                <div class="group">
                    <!-- Nested Dropdown Menu -->
                    <div class="absolute hidden group-hover:block dropdown-menu top-full left-0 bg-white text-black p-4 shadow-md">
                        <a href="flora.html" class="block py-2">Flora</a>
                        <a href="fauna.html" class="block py-2">Fauna</a>
                    </div>
                </div>
                <?php echo $menu; ?>
            </div>
        </div>
    </div>
</nav>

<script>
    // Fungsi untuk menampilkan atau menyembunyikan dropdown pada menu responsif
    function toggleMobileMenu() {
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
        }
    }

    // Tambahkan event listener untuk tombol menu responsif
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        toggleMobileMenu();
    });
</script>

</body>
</html>
