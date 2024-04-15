-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2024 pada 14.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hlsw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` varchar(1000) NOT NULL,
  `tanggal_publikasi` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `konten`, `tanggal_publikasi`, `created_at`, `updated_at`, `gambar`) VALUES
(2, 'asdas', 'asflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfakasflasflasmfak', '2024-04-04', '2024-04-04 09:01:06', '2024-04-04 09:01:06', 'download (1).jpeg'),
(3, 'oqwnjqw', 'jauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawbajauawba', '2024-04-04', '2024-04-04 09:10:01', '2024-04-04 09:10:01', '3b968954-f262-4ec4-91b8-17b4cfcfd90c.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fauna`
--

CREATE TABLE `fauna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_latin` varchar(100) NOT NULL,
  `nama_family` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `panjang` decimal(10,2) DEFAULT NULL,
  `tinggi` decimal(10,2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fauna`
--

INSERT INTO `fauna` (`id`, `nama`, `nama_latin`, `nama_family`, `deskripsi`, `berat`, `panjang`, `tinggi`, `foto`) VALUES
(1, 'singa', 'singa kali', 'kali singa', 'raja hutan', 150.00, 120.00, 80.00, NULL),
(2, 'orca', 'orca kali ', 'kali orca', 'asdasd', 10000.00, 1000.00, 200.00, NULL),
(3, 'singa', 'singa kali', 'kali singa', 'asdaiwjiadw', 200.00, 200.00, 100.00, NULL),
(4, 'singa', 'singa kali', 'kali singa', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 210.00, 241.00, 135.00, 'download (1).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flora`
--

CREATE TABLE `flora` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_latin` varchar(100) NOT NULL,
  `nama_family` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `panjang` decimal(10,2) DEFAULT NULL,
  `tinggi` decimal(10,2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `flora`
--

INSERT INTO `flora` (`id`, `nama`, `nama_latin`, `nama_family`, `deskripsi`, `berat`, `panjang`, `tinggi`, `foto`) VALUES
(7, 'mawar', 'mawar kali', 'kali mawar', 'asdad', 10.00, 10.00, 10.00, 'download (1).jpeg'),
(8, 'mawar', 'mawar kali', 'kali mawar', 'asdad', 10.00, 10.00, 10.00, 'download (1).jpeg'),
(9, ' Jengkol Hutan (JK)', 'Archidendron pauciflorum (Archidendron jiringa)', 'Mimosaceae (Fabaceae)', 'Buahnya berupa polong dan bentuknya gepeng berbelit membentuk spiral, berwarna lembayung tua. Biji buah berkulit ari tipis dengan warna cokelat mengilap. Jengkol dapat menimbulkan bau tidak sedap pada urin setelah diolah dan diproses oleh pencernaan, terutama bila dimakan segar sebagai lalap.\r\nJengkol diketahui dapat mencegah diabetes dan bersifat diuretik dan baik untuk kesehatan jantung. Tanaman jengkol diperkirakan juga mempunyai kemampuan menyerap air tanah yang tinggi sehingga bermanfaat dalam konservasi air di suatu tempat. (Wikipedia)\r\n\r\n\r\nSemak atau pohon, tinggi sampai 24 m, diameter 60(-90) cm. Kulit kayu berwarna abu-abu atau abu-abu putih, biasanya halus, jarang c. bersisik, kulit bagian dalam berwarna merah muda atau coklat kemerahan. Kayu gubalnya berwarna putih atau merah muda, kayu terasnya berwarna putih, dengan bau bawang putih yang menyengat. Cabang-cabang kecil terete dengan tonjolan-tonjolan yang bergerigi dari bekas daun, berwarna coklat muda, gundul. Daun: tangkai daun 2-7 cm, gundul, sering terdapat kelenjar pada tangkai daun, garis luarnya melingkar, sesil, subglobose hingga rata, diameter 1,5-2 mm; pinnae 1 pasang, sampai 20 cm, gundul; tangkai daun 4-6 mm, gundul; helaian daun 2 atau 3 pasang per pinna, berhadapan, dikeringkan c. keabu-abuan tua pada kedua permukaan atau hijau di bawahnya, berwarna kuning kekuning-kuningan, sisi sama atau tidak sama, bulat telur-elips sampai lonjong, 5,5-20,5 kali 2,4-7 cm, alas c. bulat asimetris hingga runcing lebar, puncak runcing tajam, kedua permukaan gundul; vena lateral utama c. 6-10 per helai daun, melengkung kuat, tidak sejajar; retikulasi halus, tidak mencolok atau menonjol pada kedua permukaan, lebih jelas di bawahnya. Perbungaan berbentuk ramiflora di bawah daun atau ketiak daun di bagian distal daun, dengan bulu-bulu tersebar di bagian distal, gundul, terdiri dari glomerulus yang berkumpul menjadi malai sepanjang 30 cm; glomerulus atau paku kecil yang terdiri dari 4-7 bunga sesil; bracts bunga bulat telur atau bulat telur-elips, lancip, 0,5-1 mm, tertekan-puber. Bunganya berwarna krem ​​​​atau putih kekuningan, pentamerous, biseksual. Kelopak berbentuk campanulata hingga berbentuk cangkir, 1-2 mm, hampir tidak puber, terutama di bagian proksimal; gigi deltoid, lancip, 0,2-0,3 mm. Corolla berbentuk corong, 4-5 mm, tabung gundul; lobus bulat telur-elips sampai lonjong, lancip, c. 2 mm, tertekan-puberul atau gundul di puncak, refleks. Benang sari c. 8-10 mm, tabung sama dengan tabung mahkota. Ovariumnya soliter, gundul. Polong bagian luar berwarna keabu-abuan sampai coklat tua atau ungu tua, bagian dalam keabu-abuan, berbentuk sabit atau terpuntir membentuk spiral lebar atau berkerut membentuk lingkaran c. diameter 11 cm, c. berlekuk dalam di antara biji di sepanjang sutura ventral, pada saat dewasa paling sering terbagi hingga ke sutura dorsal yang menebal, ruas-ruasnya dipisahkan oleh leher, polong berkayu, berukuran 20-25 kali 5,2 cm, gundul, dengan urat-urat yang tidak mencolok, pecah-pecah di sepanjang jahitan ventral. Biji berwarna coklat tua, bulat, bikonveks, diameter 2,8-3,5 cm, tebal 1-1,5 cm.\r\n', 0.00, 60.00, 24.00, 'Archidendron_jiringa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '2024-04-04 08:01:39', '2024-04-04 08:01:39'),
(2, 'admin1', '$2y$10$YSDDFlNATIAQArl/F3xs9eH4r.SvxTCc4Jvc6/.pV8prLzhfijyE.', 'mirzafio78@gmail.com', '2024-04-04 08:12:50', '2024-04-04 08:12:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fauna`
--
ALTER TABLE `fauna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `flora`
--
ALTER TABLE `flora`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fauna`
--
ALTER TABLE `fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `flora`
--
ALTER TABLE `flora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
