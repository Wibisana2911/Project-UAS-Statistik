<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Komang Wibisana">
    <meta name="description" content="Admin Statistik">
    <meta name="keywords" content="admin, statistik, komang Wibisana">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <title>STATISTIK UAS 063</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    <!-- Shortcut Web Icon -->
    <link rel="shortcut icon" href="/img/3.png">

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">

<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-300 pt-1 md:pt-0 pb-1 px-1 mt-0 h-auto fixed w-full z-40 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-black">
                <a href="#" aria-label="Home">
                    <img src="/img/3.png" alt="AdminLTE Logo" class="h-20 ml-10 ">
                </a>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-black px-2 ">
                <span class="relative w-full">
                    <input aria-label="search" type="search" id="search" placeholder="Search" class="w-full bg-gray-400 text-black transition border-spacing-11 border-transparent focus:outline-none focus:border-gray-400 rounded py-2 px-2 pl-10  appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none text-black w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </span>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">

                        @if (Route::has('login'))
                        @auth
                        <div class="relative inline-block">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                            <button onclick="toggleDD('myDropdown')" class="drop-button text-black py-2 px-2 font-bold "> <svg class="h-5 mb-1 fill-current inline"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z"/></svg> <span class="pr-2"></span> {{ Auth::user()->name }} </button>
                            @endif
                            <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-black right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                                <a href="{{ route('profile.show') }}" class="p-2 hover:bg-gray-800 text-black text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                <div class="border border-gray-800"></div>
                                <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                             class="p-2 hover:bg-gray-800 text-black text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                                </form>
                            </div>
                        </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm bg-blue-400 hover:bg-blue-200 text-black font-bold py-2 px-4 border-b-4 border-blue-600 hover:border-blue-500 rounded p-2">LOG IN</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm bg-yellow-400 hover:bg-blue-200 text-black font-bold py-2 px-4 border-b-4 border-yellow-600 hover:border-blue-500 rounded p-2">REGISTER</a>
                            @endif
                        @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>


<main>

<!-- component -->
<body class="font-poppins antialiased">
    <div
      id="view"
      class="h-full w-screen flex flex-row"
      x-data="{ sidenav: true }"
    >
      <button
        @click="sidenav = true"
        class="p-2 border-2 bg-white rounded-md border-gray-200 shadow-lg text-gray-500 focus:bg-teal-500 focus:outline-none focus:text-white absolute top-0 left-0 sm:hidden"
      >
        <svg
          class="w-5 h-5 fill-current"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="sidebar"
        class="bg-gray-200 h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out"
        x-show="sidenav"
        @click.away="sidenav = false"
      >
        <div class="space-y-6 md:space-y-10 mt-10">

          <div id="profile" class="space-y-10">
            <img
              src="img/_MG_6081.jpg"
              alt="Avatar user"
              class="w-10 md:w-28 rounded-full mx-auto"
            />
            <div>
              <h2
                class="font-medium text-xs md:text-sm text-center text-teal-500"
              >
                Komang Wibisana
              </h2>
              <p class="text-xs text-gray-500 text-center">2115101063</p>
            </div>
          </div>
          <div
            class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500"
          >

          <div id="menu" class="flex flex-col space-y-2">
            <a
              href="/"
              class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out"
            >
              <svg
                class="w-6 h-6 fill-current inline-block"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                ></path>
              </svg>
              <span class="">Dashboard</span>
            </a>
            <a
              href="/data"
              class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
            >
              <svg
                class="w-6 h-6 fill-current inline-block"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"
                ></path>
              </svg>
              <span class="">Data</span>
            </a>
            <a
              href="/frequency"
              class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
            >
              <svg
                class="w-6 h-6 fill-current inline-block"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                <path
                  fill-rule="evenodd"
                  d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="">Tabel Frekuensi Data</span>
            </a>

            </a>
          </div>
        </div>
      </div>

    </div>

    <script src="js/graph.js" type="text/javascript"></script>
    <script>
      var user = document.getElementById("user-chart").nodeName;
      var chart = new Graph({
        data: [1, 20, 5, 6, 8],
        target: document.querySelector(user),
      });
    </script>
  </body>
        </nav>

        <section class="mt-6 w-full rounded-xl">
            <div id="main" class="w-full h-full main-content flex-1 bg-gray-300 mt-12 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-200 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-400 to-yellow-500 p-4 shadow text-2xl text-black">
                        <h1 class="font-bold pl-2">STATISTIK itu apa?</h1>
                    </div>
                </div>

                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                      <div class="card-header">

                <div class="w-full h-full rounded-tl-3xl p-4 shadow text-xl text-justify bg-transparent text-black">
                    <div class="card-body">
                        <p class="">
                             &emsp14; Statistika adalah ilmu yang mempelajari bagaimana merencanakan, mengumpulkan, menganalisis,
                          menginterpretasi, dan mempresentasikan data. Singkatnya, statistika adalah ilmu yang berkenaan dengan
                          data. Istilah 'statistika' (bahasa Inggris: statistics) berbeda dengan 'statistik' (statistic).
                          Statistika merupakan ilmu yang berkenaan dengan data, sedang statistik adalah data, informasi, atau
                          hasil penerapan algoritme statistika pada suatu data. Dari kumpulan data, statistika dapat digunakan
                          untuk menyimpulkan atau mendeskripsikan data; ini dinamakan statistika deskriptif. Sebagian besar konsep
                          dasar statistika mengasumsikan teori probabilitas. Beberapa istilah statistika antara lain: populasi,
                          sampel, unit sampel, dan probabilitas.
                          </p>
                          <br>

                          <p>
                            &emsp14;Statistika banyak diterapkan dalam berbagai disiplin ilmu, baik ilmu-ilmu alam (misalnya astronomi dan
                          biologi maupun ilmu-ilmu sosial (termasuk sosiologi dan psikologi), maupun di bidang bisnis, ekonomi,
                          dan industri. Statistika juga digunakan dalam pemerintahan untuk berbagai macam tujuan; sensus penduduk
                          merupakan salah satu prosedur yang paling dikenal. Aplikasi statistika lainnya yang sekarang popular
                          adalah prosedur jajak pendapat atau polling (misalnya dilakukan sebelum pemilihan umum), serta hitung
                          cepat (perhitungan cepat hasil pemilu) atau quick count. Di bidang komputasi, statistika dapat pula
                          diterapkan dalam pengenalan pola maupun kecerdasan buatan.
                          </p>
                          <br>

                          <p>
                            &emsp14;Penggunaan istilah statistika berakar dari istilah istilah dalam bahasa latin modern statisticum
                          collegium ("dewan negara") dan bahasa Italia statista ("negarawan" atau "politikus"). Gottfried
                          Achenwall (1749) menggunakan Statistik dalam bahasa Jerman untuk pertama kalinya sebagai nama bagi
                          kegiatan analisis data kenegaraan, dengan mengartikannya sebagai "ilmu tentang negara (state)". Pada
                          awal abad ke-19 telah terjadi pergeseran arti menjadi "ilmu mengenai pengumpulan dan klasifikasi data".
                          Sir John Sinclair memperkenalkan nama (Statistics) dan pengertian ini ke dalam bahasa Inggris. Jadi,
                          statistika secara prinsip mula-mula hanya mengurus data yang dipakai lembaga-lembaga administratif dan
                          pemerintahan. Pengumpulan data terus berlanjut, khususnya melalui sensus yang dilakukan secara teratur
                          untuk memberi informasi kependudukan yang berubah setiap saat.
                          </p>
                          <br>

                          <p>
                            &emsp14;Pada abad ke-19 dan awal abad ke-20 statistika mulai banyak menggunakan bidang-bidang dalam matematika,
                          terutama peluang. Cabang statistika yang pada saat ini sangat luas digunakan untuk mendukung metode
                          ilmiah, statistika inferensi, dikembangkan pada paruh kedua abad ke-19 dan awal abad ke-20 oleh [Ronald
                          Fisher] (peletak dasar statistika inferensi), Karl Pearson (metode regresi linear), dan William Sealey
                          Gosset (meneliti problem sampel berukuran kecil). Penggunaan statistika pada masa sekarang dapat
                          dikatakan telah menyentuh semua bidang ilmu pengetahuan, mulai dari astronomi hingga linguistika.
                          Bidang-bidang ekonomi, biologi dan cabang-cabang terapannya, serta psikologi banyak dipengaruhi oleh
                          statistika dalam metodologinya. Akibatnya lahirlah ilmu-ilmu gabungan seperti ekonometrika, biometrika
                          (atau biostatistika), dan psikometrika.
                          </p>
                          <br>

                          <p>
                            &emsp14;Meskipun ada pihak yang menganggap statistika sebagai cabang dari matematika, tetapi sebagian pihak
                          lainnya menganggap statistika sebagai bidang yang banyak terkait dengan matematika melihat dari sejarah
                          dan aplikasinya. Di Indonesia, kajian statistika sebagian besar masuk dalam fakultas matematika dan ilmu
                          pengetahuan alam, baik di dalam departemen tersendiri maupun tergabung dengan matematika.
                          </p>
                      </div>

            </div>
        </section>
    </div>

    <footer class="block bottom-0 main-footer px-1 text-black w-auto mt-2 mb-2 float-right">
        <strong>Copyright &copy; 2023 <a
            href="https://elearning.undiksha.ac.id/course/view.php?id=8137" terget="blank">STATISTIK</a>.</strong>
        All rights reserved.
    </footer>
</main>



<script>
    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }
    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
</script>

<script src="js/graph.js" type="text/javascript"></script>
    <script>
      var user = document.getElementById("user-chart").nodeName;
      var chart = new Graph({
        data: [1, 20, 5, 6, 8],
        target: document.querySelector(user),
      });
    </script>

</body>

</html>
