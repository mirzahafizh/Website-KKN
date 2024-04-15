<?php
include 'config.php'; 

// Ambil data hewan jika ID telah dikirimkan
$deskripsi = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM flora WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Bangun deskripsi hewan
        $deskripsi .= '<img src="../uploads/' . $row['foto'] . '" alt="Gambar Artikel" class="w-auto h-auto mx-auto rounded-lg object-fit shadow-lg p-4">';
        $deskripsi .= '<p class="mt-8"><strong>Nama:</strong> ' . $row['nama'] . '</p>';
        $deskripsi .= '<p><strong>Nama Latin:</strong> ' . $row['nama_latin'] . '</p>';
        $deskripsi .= '<p><strong>Nama Family:</strong> ' . $row['nama_family'] . '</p>';
        $deskripsi .= '<p><strong>Deskripsi:</strong> ' . $row['deskripsi'] . '</p>';
        $deskripsi .= '<p><strong>Berat:</strong> ' . $row['berat'] . ' kg</p>';
        $deskripsi .= '<p><strong>Panjang:</strong> ' . $row['panjang'] . ' cm</p>';
        $deskripsi .= '<p><strong>Tinggi:</strong> ' . $row['tinggi'] . ' cm</p>';
        
    } else {
        $deskripsi = "Hewan tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Fauna</title>
</head>
<body class="bg-gray-100 font-serif">

<?php include 'navbar.php'; ?>

<div class="flex w-11/12 bg-white border-2 h-auto shadow-lg mx-auto mb-20 mt-20">
  <div class="flex flex-col w-1/3 sm:p-4 py-4 px-[6px] border-r-2">
    <p>List Flora</p>
    <ul>
      <?php
      // Ambil list hewan dari database
      $sql = "SELECT * FROM flora";
      $result = mysqli_query($conn, $sql);

      // Tampilkan list hewan
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              echo "<li class='mt-2'><a class='px-2 font-bold text-[12px] uppercase  underline' href='?id=".$row['id']."'>" . $row['nama'] . "</a></li>";

          }
      } else {
          echo "Tidak ada hewan yang tersedia.";
      }
      ?>
    </ul>
  </div>
  <div class="flex flex-col w-2/3  px-8 p-4">
    <p>Deskripsi</p>
    <?php echo $deskripsi; ?>
  </div>
</div>
</body>
</html>
