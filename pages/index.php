<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class="bg-gray-100">

<?php include 'navbar.php'; ?>


<div class="w-10/12 h-auto mb-10 shadow-lg shadow-gray-500 bg-white rounded-lg mx-auto">
        <!-- Content -->
        <div class="container mx-auto  mt-8 p-4">
            <!-- Your content goes here -->
            <div class="flex flex-col lg:flex-row mb-4">
                <div class="w-full mt-[10px] lg:w-1/2 lg:order-first">
                    <img src="/assets/HLSW_Pintu Gerbang.JPG" alt="Sejarah HLSW" class="w-10/12 h-auto shadow-lg shadow-gray-800 mx-auto ">
                </div>
                <div class="w-full lg:w-1/2 lg:order-last">
                    <h1 class="text-2xl font-bold mb-4 mx-4 mt-4">Sejarah HLSW</h1>
                    <p class="text-[16px] font-serif text-justify mx-4">Kawasan HLSW selalu dikembangkan dari tahun ke tahun. Sejak tahun 1934, HLSW secara langsung dipelihara oleh Sultan Kutai. Pada tahun 1947, kawasan ini mulai dimanfaatkan sebagai penampungan air bersih. Pada tahun 1992 dan 1996, HSLW dikembangkan untuk merehabilitasi 80 orang utan hasil tangkapan Borneo Orang Utan Survival Foundations (BOSF).sejak saat itu pula HLSW di fungsinkan sebagai pusat laboratorium flora dan fauna di Balikpapan. Di samping itu, HLSW juga berfungsi sebagai pusat pendidikan lingkungan.</p>
                </div>
            </div>
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
