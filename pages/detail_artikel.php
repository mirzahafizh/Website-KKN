<?php
include 'config.php';

// Periksa apakah parameter id artikel telah diberikan di URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Ambil nilai id artikel dari URL
    $article_id = $_GET['id'];

    // Query untuk mengambil detail artikel berdasarkan id
    $sql = "SELECT * FROM artikels WHERE id = $article_id";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah artikel ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Ambil data artikel
        $article = mysqli_fetch_assoc($result);
    } else {
        // Jika artikel tidak ditemukan, redirect ke halaman lain atau tampilkan pesan kesalahan
        echo "Artikel tidak ditemukan";
        exit(); // Hentikan eksekusi skrip
    }
} else {
    // Jika parameter id artikel tidak diberikan, redirect ke halaman lain atau tampilkan pesan kesalahan
    echo "ID Artikel tidak diberikan";
    exit(); // Hentikan eksekusi skrip
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
    <title>Detail Artikel - Hutan Lindung Sungai Wain</title>
</head>
<body class="bg-gray-100">

<?php include 'navbar.php'; ?>

<div class="w-10/12 mx-auto my-10 p-4 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6 "><?= $article['judul'] ?></h1>

    <div class="bg-white  w-full p-6 ">
        <img src="../uploads/<?= $article['gambar'] ?>" alt="Gambar Artikel" class="mx-auto mb-6 rounded-lg object-fit w-94  h-94">
        <p class="text-gray-700 mb-6 break-words" ><?= $article['konten'] ?></p>
    </div>
</div>

</body>
</html>
