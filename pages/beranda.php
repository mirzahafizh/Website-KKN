<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Home</title>
    <style>
        /* Menghilangkan margin dan padding dari body */
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>


<div class="bg-[url('../assets/cover_w375_h280_image-small-orangutan-faq-final.jpg')] bg-cover h-screen w-full  bg-no-repeat bg-center ">
<?php include 'navbar.php'; ?>

        <div class="w-10/12 h-auto mx-auto mt-[150px] ">
            <h1 class="text-4xl md:text-5xl font-serif text-white font-bold">Hutan Lindung Sungai <br> Wain</h1>
            <p class="text-lg md:text-xl font-serif text-white mt-4"> Hutan Lindung Sungai Wain atau disingkat HLSW merupakan salah satu objek wisata alam <br> yang berada di jalan Soekarno-Hatta Kota Balikpapan Kalimantan Timur. HLSW adalah perpaduan objek wisata hutan dan sungai</p>
            <a href="artikel.php" class="inline-block mt-4 px-8 py-2 bg-white text-green-500 font-semibold shadow-md hover:bg-green-600 transition duration-300">Selengkapnya</a>
        </div>

</div>
<script>
    // Toggle mobile menu visibility
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
