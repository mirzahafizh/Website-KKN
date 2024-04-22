<?php
include 'config.php';

// Query untuk mengambil semua artikel dari tabel artikels
$sql = "SELECT * FROM artikels";
$result = mysqli_query($conn, $sql);

// Inisialisasi array untuk menyimpan data artikel
$articles = [];

// Cek apakah ada artikel yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Loop melalui setiap baris hasil query dan simpan data artikel ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }
}

// Tutup koneksi database
mysqli_close($conn);
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

<?php include 'navbar.php'; ?>

<div class="w-10/12 mx-auto my-10 p-4 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6">Artikel Hutan Lindung Sungai Wain</h1>

    <div class="bg-white  w-full p-6 ">
    <?php foreach ($articles as $article): ?>
        <div class="mb-8 bg-gray-100  p-6 rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <a href="detail_artikel.php?id=<?= $article['id'] ?>" class="flex ">
                <div class="mr-6 w-1/6 mb-4">
                    <img src="../uploads/<?= $article['gambar'] ?>" alt="Gambar Artikel" class="w-auto h-40 mx-auto rounded-lg object-fit mt-4 ">
                </div>
                <div class="mt-4 w-3/4 ">
                    <h2 class="text-2xl font-bold mb-4"><?= $article['judul'] ?></h2>
                    <p class="text-gray-700 break-words">
                        <?= substr($article['konten'], 0, 200) ?><?= strlen($article['konten']) > 200 ? '...' : '' ?>
                    </p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- Add more articles as needed -->
</div>




<script>
    // Toggle mobile menu visibility
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
