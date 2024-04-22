<?php
include 'config.php'; 

// Query untuk mengambil semua data flora dari tabel flora
$sql = "SELECT * FROM flora";
$result = mysqli_query($conn, $sql);

// Inisialisasi array untuk menyimpan data flora
$flora = [];

// Cek apakah ada flora yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Loop melalui setiap baris hasil query dan simpan data flora ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $flora[] = $row;
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
    <title>Flora</title>
</head>
<body class="bg-gray-100 font-serif">
    <?php include 'navbar.php'; ?>
    <div class="w-11/12 bg-white shadow-lg mx-auto border mt-8 h-screen mb-8 rounded-lg">
    <h1 class="text-3xl font-bold text-center font-serif mt-8 uppercase">Flora</h1>
                <!-- Search Bar -->
                <div class="w-full mx-auto flex justify-center">
                    <input type="text" id="searchInput" onkeyup="searchFlora()" placeholder="Cari nama lokal flora..." class="border-2 w-10/12 rounded-lg p-2 mb-4">
                </div>
        <div class="bg-white container h-auto mx-auto max-w-screen-2xl justify-center gap-8">
            <div>

            </div>
            <div class="card-container w-full flex flex-wrap justify-center mb-8 gap-8 h-full mt-12">
                <!-- Card Flora -->
                <?php foreach ($flora as $flora_item): ?>
                    <a href="detail_flora.php?id=<?= $flora_item['id'] ?>" class="bg-white shadow-lg h-62 hover:shadow-xl transition-transform transform hover:scale-105 product-item">
                        <div>
                            <img src="../uploads/<?= $flora_item['foto'] ?>" alt="Product Image" class="w-52 h-52 object-fit">
                            <h3 class="text-xl font-bold mb-1 px-3 uppercase"><?= $flora_item['local_name'] ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        function searchFlora() {
            // Get the search input value
            var input, filter, floraItems, floraName;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            floraItems = document.getElementsByClassName('product-item');

            // Iterate over each flora item and hide those that do not match the search criteria
            for (var i = 0; i < floraItems.length; i++) {
                floraName = floraItems[i].getElementsByTagName('h3')[0].innerText.toUpperCase(); // Get the flora name
                if (floraName.indexOf(filter) > -1) {
                    floraItems[i].style.display = "";
                } else {
                    floraItems[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
