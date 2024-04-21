<?php
include 'config.php';

// Pastikan ID flora dikirimkan melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID flora tidak valid";
    exit;
}

// Query untuk mengambil data flora berdasarkan ID yang diberikan
$id_fauna = $_GET['id'];
$sql = "SELECT * FROM fauna WHERE id = $id_fauna";
$result = mysqli_query($conn, $sql);

// Pastikan flora dengan ID yang diberikan ada
if (mysqli_num_rows($result) != 1) {
    echo "Fauna tidak ditemukan";
    exit;
}

// Ambil data flora
$fauna = mysqli_fetch_assoc($result);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama = $_POST['nama'];
    $nama_latin = $_POST['nama_latin'];
    $nama_family = $_POST['nama_family'];
    $deskripsi = $_POST['deskripsi'];
    $berat = $_POST['berat'];
    $panjang = $_POST['panjang'];
    $tinggi = $_POST['tinggi'];

    // Handle photo upload if provided
    if ($_FILES['foto']['name']) {
        $foto_name = $_FILES['foto']['name'];
        $foto_tmp_name = $_FILES['foto']['tmp_name'];
        $foto_size = $_FILES['foto']['size'];
        $foto_error = $_FILES['foto']['error'];

        $foto_extension = pathinfo($foto_name, PATHINFO_EXTENSION);
        $allowed_extensions = array("jpg", "jpeg", "png");

        if (in_array($foto_extension, $allowed_extensions)) {
            $destination = "../uploads/" . $foto_name;
            move_uploaded_file($foto_tmp_name, $destination);
        } else {
            echo "Format foto tidak didukung";
            exit;
        }
    }

    // Update flora data in the database
    $sql = "UPDATE fauna SET nama='$nama', nama_latin='$nama_latin', nama_family='$nama_family', deskripsi='$deskripsi', berat='$berat', panjang='$panjang', tinggi='$tinggi', foto='$foto_name' WHERE id=$id_fauna";
    if (mysqli_query($conn, $sql)) {
        echo "Data fauna berhasil diperbarui";
    } else {
        echo "Gagal memperbarui data fauna: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fauna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Fauna</h2>
    <form method="post" enctype="multipart/form-data" class="max-w-md bg-white rounded-lg overflow-hidden shadow-lg p-6 mx-auto">
        <input type="hidden" name="id" value="<?php echo $fauna['id']; ?>">

        <div class="mb-4">
            <label for="nama" class="block text-sm font-bold mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo isset($fauna['nama']) ? $fauna['nama'] : ''; ?>" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="nama_latin" class="block text-sm font-bold mb-2">Nama Latin:</label>
            <input type="text" id="nama_latin" name="nama_latin" value="<?php echo isset($fauna['nama_latin']) ? $fauna['nama_latin'] : ''; ?>" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="nama_family" class="block text-sm font-bold mb-2">Nama Family:</label>
            <input type="text" id="nama_family" name="nama_family" value="<?php echo isset($fauna['nama_family']) ? $fauna['nama_family'] : ''; ?>" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-bold mb-2">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" class="w-full border border-gray-300 rounded-lg p-2 required"><?php echo isset($fauna['deskripsi']) ? $fauna['deskripsi'] : ''; ?></textarea>
        </div>

        <div class="mb-4">
            <label for="berat" class="block text-sm font-bold mb-2">Berat:</label>
            <input type="text" id="berat" name="berat" value="<?php echo isset($fauna['berat']) ? $fauna['berat'] : ''; ?>" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="panjang" class="block text-sm font-bold mb-2">Panjang:</label>
            <input type="text" id="panjang" name="panjang" value="<?php echo isset($fauna['panjang']) ? $fauna['panjang'] : ''; ?>" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="tinggi" class="block text-sm font-bold mb-2">Tinggi:</label>
            <input type="text" id="tinggi" name="tinggi" value="<?php echo isset($fauna['tinggi']) ? $fauna['tinggi'] : ''; ?>" class="w-full border border-gray-300 rounded-lg p-2" required >
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-sm font-bold mb-2">Foto:</label>
            <input type="file" id="foto" name="foto" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div>
            <input type="submit" value="Submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 cursor-pointer">
        </div>
    </form>
</body>

</html>
