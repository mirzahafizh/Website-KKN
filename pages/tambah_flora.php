<?php
include 'config.php'; 

if(isset($_POST['submit'])) {
    $local_name = $_POST['local_name'];
    $latin_name = $_POST['latin_name'];
    $family = $_POST['family'];
    $description = $_POST['description'];
    $ekologi = $_POST['ekologi'];
    $distribusi = $_POST['distribusi'];


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
            $sql = "INSERT INTO flora (local_name, latin_name, family, description,ekologi,distribusi,foto) VALUES ('$local_name','$latin_name', '$family', '$description','$ekologi','$distribusi', '$foto')";

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
    <div class="bg-white border-2 p-4 mx-auto max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Tambah Flora</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
                <label for="local_name" class="block text-sm font-bold mb-2">Nama Lokal:</label>
                <input type="text" id="local_name" name="local_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="latin_name" class="block text-sm font-bold mb-2">Nama Latin:</label>
                <input type="text" id="latin_name" name="latin_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="family" class="block text-sm font-bold mb-2">Family:</label>
                <input type="text" id="family" name="family" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2">Deskripsi:</label>
                <textarea id="description" name="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="ekologi" class="block text-sm font-bold mb-2">Ekologi:</label>
                <textarea id="ekologi" name="ekologi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="distribusi" class="block text-sm font-bold mb-2">Distribusi:</label>
                <textarea id="distribusi" name="distribusi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-bold mb-2">Foto:</label>
                <input type="file" id="foto" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
