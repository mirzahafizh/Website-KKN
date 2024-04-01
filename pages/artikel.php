<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Artikel - Hutan Lindung Sungai Wain</title>
</head>
<body class="bg-gray-100">

<?php include 'navbar.php'; ?>


    <!-- Content -->
    <div class="w-10/12 mx-auto my-10 p-4 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Artikel Hutan Lindung Sungai Wain</h1>

        <!-- Article 1 -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Judul Artikel Pertama</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus auctor risus vel pretium. ...</p>
            <a href="#" class="text-blue-500 hover:underline">Baca selengkapnya &rarr;</a>
        </div>

        <!-- Article 2 -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Judul Artikel Kedua</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus auctor risus vel pretium. ...</p>
            <a href="#" class="text-blue-500 hover:underline">Baca selengkapnya &rarr;</a>
        </div>

        <!-- Add more articles as needed -->

    </div>

    <script>
        // Toggle mobile menu visibility
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        
    </script>

</body>
</html>
