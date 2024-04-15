<?php
include 'config.php'; 

if(isset($_POST['submit'])) {
    // Tangkap data dari formulir
    $nama = $_POST['nama'];
    $nama_latin = $_POST['nama_latin'];
    $nama_family = $_POST['nama_family'];
    $deskripsi = $_POST['deskripsi'];
    $berat = $_POST['berat'];
    $panjang = $_POST['panjang'];
    $tinggi = $_POST['tinggi'];

    // Periksa apakah file telah diunggah dengan benar
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Foto
        $foto = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];

        // Direktori tujuan untuk menyimpan foto
        $upload_dir = "../uploads/";
        // Path lengkap untuk menyimpan foto
        $target_file = $upload_dir . basename($foto);
        // Ekstensi gambar yang diperbolehkan
        $allowed_ext = array("jpg", "jpeg", "png", "gif");
        // Ekstensi file gambar yang diupload
        $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi ekstensi gambar
        if (!in_array($ext, $allowed_ext)) {
            echo "<script>alert('Hanya file gambar dengan format JPG, JPEG, PNG, atau GIF yang diperbolehkan!')</script>";
        } else {
            // Buat kueri SQL INSERT
            $sql = "INSERT INTO fauna (nama, nama_latin, nama_family, deskripsi, berat, panjang, tinggi, foto) VALUES ('$nama', '$nama_latin', '$nama_family', '$deskripsi', '$berat', '$panjang', '$tinggi', '$foto')";

            // Jalankan kueri
            if(mysqli_query($conn, $sql)) {
                // Pindahkan foto ke direktori tujuan
                move_uploaded_file($foto_tmp, $target_file);
                // Pesan berhasil
                echo "<script>alert('Data berhasil disimpan.')</script>";
            } else {
                // Pesan error
                echo "<script>alert('Error: " . $sql . "\\n" . mysqli_error($conn) . "')</script>";
            }
        }
    } else {
        // Jika tidak ada file yang diunggah, berikan pesan kesalahan
        echo "<script>alert('Tidak ada file foto yang diunggah atau terjadi kesalahan dalam pengunggahan.')</script>";
    }
}
?>


<div class="container mx-auto p-8">
    <h2 class="text-2xl font-bold mb-4">Tambah flora</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="w-full max-w-lg">
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="nama_latin" class="block text-gray-700 text-sm font-bold mb-2">Nama Latin:</label>
            <input type="text" id="nama_latin" name="nama_latin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="nama_family" class="block text-gray-700 text-sm font-bold mb-2">Nama Family:</label>
            <input type="text" id="nama_family" name="nama_family" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <label for="berat" class="block text-gray-700 text-sm font-bold mb-2">Berat (kg):</label>
            <input type="number" id="berat" name="berat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="panjang" class="block text-gray-700 text-sm font-bold mb-2">Panjang (cm):</label>
            <input type="number" id="panjang" name="panjang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="tinggi" class="block text-gray-700 text-sm font-bold mb-2">Tinggi (cm):</label>
            <input type="number" id="tinggi" name="tinggi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto:</label>
            <input type="file" id="foto" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
