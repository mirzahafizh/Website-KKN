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

     <!-- Navbar -->
     <nav class="bg-green-700 font-serif p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Website Name -->
            <div class="text-white font-bold text-xl">HLSW</div>

            <!-- Navbar Links -->
            <div class="hidden md:flex space-x-10">
                <a href="beranda.php" class="text-white hover:text-gray-300">About</a>
                <a href="artikel.php" class="text-white hover:text-gray-300">Arcticle</a>
                
                <!-- Dropdown Trigger -->
                <div class="relative group">
                    <a href="#" class="text-white hover:text-gray-300">Gallery</a>
                    <!-- Dropdown Menu -->
                    <div class="absolute hidden group-hover:block dropdown-menu top-full left-[-20px] bg-green-700  text-white w-[100px] p-4 ">
                        <a href="flora.php" class="block py-2 ">Flora</a>
                        <a href="fauna.php" class="block py-2">Fauna</a>
                    </div>
                </div>
                <a href="login.php" class="text-white hover:text-gray-300">Login</a>
                
            </div>

            <!-- Responsive Dropdown for Small Screens -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="mobile-menu" class="hidden absolute top-14 right-0 bg-green-700 text-white p-4 shadow-md w-full md:w-auto">
                    <a href="index.html" class="block py-2">About</a>
                    <a href="artikel.html" class="block py-2">Article</a>
                    <div class="group">
                        <a href="#" class="block py-2">Gallery</a>
                        <!-- Nested Dropdown Menu -->
                        <div class="absolute hidden group-hover:block dropdown-menu top-full left-0 bg-white text-black p-4 shadow-md">
                            <a href="flora.html" class="block py-2">Flora</a>
                            <a href="fauna.html" class="block py-2">Fauna</a>
                        </div>
                    </div>
                    <a href="#" class="block py-2">Login</a>
                </div>
            </div>
        </div>
    </nav>

    </body>
    </html>