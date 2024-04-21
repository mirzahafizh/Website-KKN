<?php
include 'config.php'; 


// Query untuk mengambil semua artikel dari tabel artikels
$sql = "SELECT * FROM fauna";
$result = mysqli_query($conn, $sql);

// Inisialisasi array untuk menyimpan data artikel
$fauna = [];

// Cek apakah ada artikel yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Loop melalui setiap baris hasil query dan simpan data artikel ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $fauna[] = $row;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Fauna</title>
</head>
<body class="bg-gray-100 font-serif">

<?php include 'navbar.php'; ?>

<div class="w-11/12 bg-white shadow-lg mx-auto border mt-8 h-screen mb-8 rounded-lg ">
<div class=" bg-white container  h-auto  mx-auto   max-w-screen-2xl justify-center gap-8" ">
    <div class=" ">
    <h1 class="text-3xl font-bold text-center font-serif mt-8 uppercase">Fauna</h1> <!-- Judul di luar flex container -->
    </div>
    <div class="card-container w-full  flex flex-wrap justify-center mb-8 gap-8 h-full   mt-12 ">
    <!-- Card 1 -->
        <div class="grid grid-cols-2 md:grid-cols-2 h-full  lg:grid-cols-4 xl:grid-cols-4  sm:w-8/12 gap-2 sm:gap-6">

    <?php
// Loop untuk membuat card dari data produk
foreach ($fauna as $fauna) {
    echo "<a href='detail_fauna.php?id={$fauna['id']}' class='bg-white shadow-lg h-62 hover:shadow-xl transition-transform transform hover:scale-105'>";
    echo "<div class=''>";
    echo "<img src='../uploads/" . $fauna['foto'] . "' alt='Product Image' class='w-full h-40 object-fit'>";
    echo "<h3 class='text-xl font-bold mb-1 px-3 uppercase'>" . $fauna['nama'] . "</h3>";
    echo "</div>";
    echo "</a>";
}
?>

</body>
</html>
