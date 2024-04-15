<?php
// Lakukan koneksi ke database di sini (gunakan mysqli atau PDO)
include 'config.php';
// Proses form tambah artikel
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $konten = mysqli_real_escape_string($conn, $_POST['konten']);
    $tanggal_publikasi = date("Y-m-d H:i:s"); // Tanggal publikasi saat ini
    $gambar = $_FILES['gambar']['name']; // Nama file gambar
    $gambar_tmp = $_FILES['gambar']['tmp_name']; // Lokasi sementara file gambar

    // Direktori tujuan untuk menyimpan gambar
    $upload_dir = "../uploads/";
    // Path lengkap untuk menyimpan gambar
    $target_file = $upload_dir . basename($gambar);
    // Ekstensi gambar yang diperbolehkan
    $allowed_ext = array("jpg", "jpeg", "png", "gif");
    // Ekstensi file gambar yang diupload
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    // Validasi ekstensi gambar
    if (!in_array($ext, $allowed_ext)) {
        echo "<script>alert('Hanya file gambar dengan format JPG, JPEG, PNG, atau GIF yang diperbolehkan!')</script>";
    } else {
        // Pindahkan file gambar dari lokasi sementara ke direktori tujuan
        if (move_uploaded_file($gambar_tmp, $target_file)) {
            // Query untuk menambahkan data artikel baru ke database
            $sql = "INSERT INTO artikels (judul, konten, tanggal_publikasi, gambar) VALUES ('$judul', '$konten', '$tanggal_publikasi', '$gambar')";

            // Jalankan query
            if (mysqli_query($conn, $sql)) {
                // Jika penambahan artikel berhasil, tampilkan pesan sukses
                echo "<script>alert('Artikel berhasil ditambahkan!')</script>";
            } else {
                // Jika terjadi kesalahan, tampilkan pesan error
                echo "<script>alert('Terjadi kesalahan saat menambahkan artikel!')</script>";
            }
        } else {
            // Jika gagal memindahkan file, tampilkan pesan error
            echo "<script>alert('Gagal mengunggah gambar!')</script>";
        }
    }
}

?>

<h2 class="text-2xl font-bold mb-4">Tambah Artikel</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul:</label>
        <input type="text" id="judul" name="judul" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="konten" class="block text-gray-700 font-semibold mb-2">Konten:</label>
        <textarea id="konten" name="konten" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" rows="6" required></textarea>
    </div>
    <div class="mb-4">
        <label for="gambar" class="block text-gray-700 font-semibold mb-2">Foto:</label>
        <input type="file" id="gambar" name="gambar" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" accept="image/*" required>
    </div>
    <div class="mb-4">
        <button type="submit" name="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Tambah Artikel</button>
    </div>
</form>

