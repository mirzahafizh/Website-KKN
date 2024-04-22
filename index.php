<?php
session_start(); 
include 'pages/config.php';

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
                <a href="pages/dashboard.php" class="block hover:bg-green-500 p-4 mt-2">Dashboard</a>
                <form action="" method="post">
                    <button type="submit" name="logout"
                        class="p-4 text-left hover:bg-green-500 w-full text-white outline-none">Logout</button>
                </form>
            </div>
        </div>';
} else {
    // Jika belum login, tampilkan menu login
    $menu .= '<a href="pages/login.php" class="text-white hover:text-gray-300">Login</a>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Home</title>
    <style>
        /* Menghilangkan margin dan padding dari body */
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>


<div class="bg-[url('assets/cover_w375_h280_image-small-orangutan-faq-final.jpg')] bg-cover h-screen w-full  bg-no-repeat bg-center ">
<!-- Navbar -->
<nav class="bg-green-700 font-serif p-4 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Website Name -->
        <div class="text-white font-bold text-xl">HLSW</div>

        <!-- Navbar Links -->
        <div class="hidden md:flex space-x-10">
            <a href="../index.php" class="text-white hover:text-gray-300">About</a>
            <a href="pages/artikel.php" class="text-white hover:text-gray-300">Article</a>
            <a href="pages/flora.php" class="text-white hover:text-gray-300">Flora</a>
            <a href="pages/fauna.php" class="text-white hover:text-gray-300">Fauna</a>


            <!-- Menu Login/User -->
            <?php echo $menu; ?>
        </div>

        <!-- Responsive Dropdown for Small Screens -->
        <div class="md:hidden">
            <button id="dropdown-menu-button" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdown-menu" class="hidden absolute top-14 right-0 bg-green-700 text-white p-4 shadow-md w-full md:w-auto">
                <a href="pages/index.html" class="block py-2">About</a>
                <a href="pages/artikel.html" class="block py-2">Article</a>
                <a href="pages/flora.html" class="block py-2">Flora</a>
                        <a href="pages/fauna.html" class="block py-2">Fauna</a>
                <?php echo $menu; ?>


            </div>
        </div>
    </div>
</nav>


        <div class="w-10/12 h-auto mx-auto mt-[150px] ">
            <h1 class="text-4xl md:text-5xl font-serif text-white font-bold">Hutan Lindung Sungai <br> Wain</h1>
            <p class="text-lg md:text-xl font-serif text-white mt-4"> Hutan Lindung Sungai Wain atau disingkat HLSW merupakan salah satu objek wisata alam <br> yang berada di jalan Soekarno-Hatta Kota Balikpapan Kalimantan Timur. HLSW adalah perpaduan objek wisata hutan dan sungai</p>
            <a href="pages/artikel.php" class="inline-block mt-4 px-8 py-2 bg-white text-green-500 font-semibold shadow-md hover:bg-green-600 hover:text-white transition duration-300">Selengkapnya</a>
        </div>

</div>
<script>
    // Fungsi untuk menampilkan atau menyembunyikan dropdown pada menu responsif
    function toggleDropdownMenu() {
        var mobileMenu = document.getElementById('dropdown-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
        }
    }

    // Tambahkan event listener untuk tombol menu responsif
    document.getElementById('dropdown-menu-button').addEventListener('click', function() {
        toggleDropdownMenu();
    });
</script>

</body>
</html>
