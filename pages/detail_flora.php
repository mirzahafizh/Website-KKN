<?php
include 'config.php';

// Ambil ID hewan dari URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data hewan berdasarkan ID
    $sql = "SELECT * FROM flora WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    // Pastikan data hewan ditemukan
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Ekstrak data
        $nama = $row['local_name'];
        $namaLatin = $row['latin_name'];
        $namaFamily = $row['family'];
        $deskripsi = $row['description'];
        $ekologi = $row['ekologi'];
        $distribusi = $row['distribusi'];
        $foto = $row['foto'];
    } else {
        // Jika data tidak ditemukan, tampilkan pesan
        $nama = "Data tidak ditemukan";
        $deskripsi = "Maaf, data hewan tidak ditemukan.";
    }
} else {
    // Jika ID tidak dikirimkan, tampilkan pesan
    $nama = "ID tidak tersedia";
    $deskripsi = "Maaf, ID hewan tidak tersedia.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Fauna</title>
</head>
<body class="bg-gray-100 font-serif">

<?php include 'navbar.php'; ?>

<div class="container mx-auto py-8">
    <div class="w-10/12 mx-auto bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4"><?php echo $nama; ?></h1>
        <img src="../uploads/<?php echo $foto; ?>" alt="<?php echo $nama; ?>" class="mx-auto mb-4 object-fit w-auto h-auto">
        <p class="text-lg mb-4"><span class="font-bold">Nama Latin:</span> <?php echo $namaLatin; ?></p>
        <p class="text-lg mb-4"><span class="font-bold">Nama Family:</span> <?php echo $namaFamily; ?></p>
        <p class="text-lg mb-4 break-words"><span class="font-bold">Deskripsi:</span> <?php echo $deskripsi; ?></p>
        <p class="text-lg mb-4 break-words"><span class="font-bold">Ekologi:</span> <?php echo $ekologi; ?></p>
        <p class="text-lg mb-4 break-words"><span class="font-bold">Distribusi:</span> <?php echo $distribusi; ?></p>
</div>

</body>
</html>
