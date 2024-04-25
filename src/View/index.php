<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/output.css">
    <title><?= ucwords($page) ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(to right bottom, rgba(2, 6, 23, 0), rgba(2, 6, 23, 1.0)), url('../public/images/sunset.jpg') center/cover no-repeat fixed;
        }
    </style>
</head>

<body class=" w-full min-h-screen flex flex-col">
    <!-- Nav Area Template -->
    <nav id="navbar" class=" z-50 fixed top-0 left-0 w-full flex flex-row items-center justify-between text-zinc-100">
        <div id="logo-area" class=" flex flex-row gap-2 items-center p-2 font-extrabold text-xl"><i data-lucide="sun" class=" stroke-[3]"></i>Sunset City</div>
        <div id="nav-area">
            <ul class=" menu menu-horizontal flex flex-row items-center">
                <li><a href="?page=index">Home</a></li>
                <li><a href="?page=profile">About Us</a></li>
                <li><a href="?page=contact">Contacts</a></li>
                <li><a href="?page=reserve" class=" btn btn-accent">Reserve Now</a></li>
            </ul>
        </div>
    </nav>
    <!-- Main Content Area -->
    <main>
        <section role="hero" id="hero" class=" h-screen w-full flex flex-col items-center justify-center">
            <div class=" flex flex-col w-full text-zinc-100 items-end p-4">
                <span class=" font-semibold text-2xl">Make your sunsets a little more</span>
                <span class=" font-extrabold text-9xl">SPECIAL</span>
                <span>Where every day ends with a masterpiece. Sunset City Suites: Your haven in the heart of tranquility.</span>
                <button class=" btn btn-accent mt-6" onclick=" location.href = '?page=profile'">Discover more!</button>
            </div>
        </section>
        
        <!--<button id="up" class=" hidden group fixed bottom-6 right-6 btn bg-slate-950 text-zinc-100" onclick="location.href='#'">
            <i data-lucide="arrow-up" class=" group-hover:text-slate-950"></i>
        </button>-->
    </main>
    <!-- Icon CDN # Source: Lucide.dev -->
    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        navbar = document.getElementById('navbar');
        window.onscroll = () => {
            if (window.scrollY > 150) {
                navbar.classList.add('bg-slate-950');
            } else {
                navbar.classList.remove('bg-slate-950');
            }
        };
    </script>
</body>

</html>