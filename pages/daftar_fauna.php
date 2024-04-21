<?php
include 'config.php';

// Query untuk mengambil semua data fauna dari tabel fauna
$sql = "SELECT * FROM fauna";
$result = mysqli_query($conn, $sql);

// Inisialisasi array untuk menyimpan data fauna
$fauna = [];

// Cek apakah ada fauna yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Loop melalui setiap baris hasil query dan simpan data fauna ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $fauna[] = $row;
    }
}
?>


<div>
    <h3 class="text-xl font-semibold mb-2">Daftar Fauna</h3>
    
    <div class="w-full  mx-auto flex justify-center">
        <!-- Input pencarian -->
        <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Cari nama fauna..." class="border-2 w-10/12 rounded-lg p-2 mb-4">
    </div>
    
    <?php foreach ($fauna as $fauna): ?>
        <div class="border-2 p-4 mb-4 product-item bg-white rounded-lg">
            <!-- Product photo -->
            <?php
            $image_path = '../uploads/' . $fauna['foto']; // Path to the fauna photo folder
            if (file_exists($image_path)) {
                echo '<img src="' . $image_path . '" alt="Fauna Photo" class="w-24 h-24">';
            } else {
                echo '<p>Gambar tidak ditemukan</p>';
            }
            ?>

            <!-- Product details -->
            <p><strong>Nama:</strong> <?php echo $fauna['nama']; ?></p>
            <p style="display:none;"><strong>ID Fauna:</strong> <?php echo $fauna['id']; ?></p>
            <!-- Add more product details as needed -->

            <!-- Tombol Edit dan Delete -->
            <div class="mt-4">
                <form method="post" action="dashboard.php" class="inline-block">
                    <input type="hidden" name="id_fauna" value="<?php echo $fauna['id']; ?>">
                    <button type="submit" name="delete_fauna" class="bg-red-500 text-white rounded-lg py-2 px-4 mt-2 mr-2">Delete Fauna</button>
                </form>
                <a href="dashboard.php?action=edit_fauna&id=<?php echo $fauna['id']; ?>" class="bg-blue-500 rounded-lg text-white py-2 px-4 mt-2 inline-block">Edit Fauna</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    function searchProducts() {
        // Get the search input value
        var input, filter, products, productName;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        products = document.getElementsByClassName('product-item');

        // Iterate over each product and hide those that do not match the search criteria
        for (var i = 0; i < products.length; i++) {
            productName = products[i].getElementsByTagName('p')[0].innerText.toUpperCase(); // Get the product name
            if (productName.indexOf(filter) > -1) {
                products[i].style.display = "";
            } else {
                products[i].style.display = "none";
            }
        }
    }
</script>
