<?
include 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-[#FFF6F6]">

<div class="flex">
<!-- Sidebar -->
<div class="flex flex-col justify-between bg-white border-2 text-black w-1/5 min-h-screen max-h-full py-6 font-serif">
        <div>
            <h1 class="text-[20px] font-serif text-bold px-2 mb-8">Hutan Lindung Sungai Wain</h1>
            <a href="?action=daftar_flora" class="block py-2 px-4 text-black hover:bg-gray-300">Daftar Flora</a>
            <a href="?action=daftar_fauna" class="block py-2 px-4 text-black hover:bg-gray-300">Daftar Fauna</a>
            <a href="?action=tambah_artikel" class="block py-2 px-4 text-black hover:bg-gray-300">Tambah Artikel</a>
            <a href="?action=tambah_flora" class="block py-2 px-4 text-black hover:bg-gray-300">Tambah Flora</a>
            <a href="?action=tambah_fauna" class="block py-2 px-4 text-black hover:bg-gray-300">Tambah Fauna</a>
            <a href="beranda.php" class="block py-2 px-4 text-black hover:bg-gray-300">Beranda</a>
            <form method="post" action="" class="mt-[50px]">
                <button type="submit" name="logout" class="block py-2 px-4 w-10/12 ml-2 rounded-lg text-black bg-[#FF8787] hover:bg-red-700">Logout</button>
            </form>
        </div>
        <!-- Logout Button -->

    </div>


    <!-- Content -->
    <div class="w-4/5 p-8">
        <!-- Content goes here -->
        <h2 class="text-2xl font-bold mb-4">Welcome to Admin Panel</h2>
        <?php
        // Handle different actions based on the selected menu item
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'daftar_flora':
                    include 'daftar_flora.php'; // You can create daftar_user.php for listing and managing users
                    break;
                case 'daftar_fauna':
                    include 'daftar_fauna.php'; // You can create daftar_barang.php for listing products
                    break;
                case 'tambah_artikel':
                    include 'tambah_artikel.php'; // You can create tambah_user.php for adding new users
                    break;
                case 'tambah_flora':
                    include 'tambah_flora.php'; // You can create tambah_user.php for adding new users
                    break;
                case 'tambah_fauna':
                    include 'tambah_fauna.php'; // You can create tambah_user.php for adding new users
                    break;
                default:
                    // Default content if no action is specified
                    echo "Select a menu item from the sidebar.";
            }
        } else {
            // Default content if no action is specified
            echo "Select a menu item from the sidebar.";
        }
        ?>
    </div>
</div>

</body>
</html>