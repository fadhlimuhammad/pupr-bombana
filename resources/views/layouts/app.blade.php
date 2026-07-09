<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dinas PUPR Kabupaten Bombana')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Alpine.js & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{ highContrast: false, largeText: false }" 
      :class="{'text-lg': largeText, 'bg-gray-50 flex flex-col min-h-screen font-sans antialiased text-gray-800': true}" 
      class="bg-gray-50 flex flex-col min-h-screen font-sans antialiased text-gray-800">
    
    <!-- Navbar -->
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false"
         :class="{'bg-pupr-blue/85 backdrop-blur-lg shadow-lg border-b border-white/20': scrolled, 'bg-pupr-blue': !scrolled, 'grayscale contrast-125': highContrast}"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 flex items-center gap-3 group">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 flex items-center justify-center group-hover:scale-105 transition-transform">
                                <img src="{{ asset('images/logo.jpg') }}" alt="Logo PUPR" class="w-full object-contain">
                            </div>
                            <div class="w-10 h-10 flex items-center justify-center group-hover:scale-105 transition-transform">
                                <img src="{{ asset('images/Bombana.png') }}" alt="Logo Kabupaten Bombana" class="w-full object-contain">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg text-white leading-tight">Dinas PUPR</span>
                            <span class="font-medium text-xs text-pupr-yellow tracking-wider">Kabupaten Bombana</span>
                        </div>
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-1 lg:space-x-4 text-white">
                    <a href="/" class="hover:text-pupr-yellow transition-colors px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="/profil" class="hover:text-pupr-yellow transition-colors px-3 py-2 rounded-md text-sm font-medium">Profil</a>
                    <!-- Dropdown Berita -->
                    <div class="relative" x-data="{ openDropdown: false }" @mouseenter="openDropdown = true" @mouseleave="openDropdown = false">
                        <button class="hover:text-pupr-yellow transition-colors px-3 py-2 rounded-md text-sm font-medium inline-flex items-center gap-1">
                            Berita <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        <div x-show="openDropdown" x-transition.opacity
                             class="absolute left-0 mt-0 w-48 bg-white rounded-lg shadow-xl py-2 text-gray-800 border border-gray-100">
                            <a href="/berita" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Semua Berita</a>
                            <a href="/berita?divisi=bina-marga" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Divisi Bina Marga</a>
                            <a href="/berita?divisi=cipta-karya" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Divisi Cipta Karya</a>
                            <a href="/berita?divisi=sda" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Divisi SDA</a>
                            <a href="/berita?divisi=tata-ruang" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Divisi Tata Ruang</a>
                        </div>
                    </div>
                    <a href="/galeri" class="hover:text-pupr-yellow transition-colors px-3 py-2 rounded-md text-sm font-medium">Galeri</a>
                    
                    <!-- Dropdown Informasi -->
                    <div class="relative" x-data="{ openDropdown: false }" @mouseenter="openDropdown = true" @mouseleave="openDropdown = false">
                        <button class="hover:text-pupr-yellow transition-colors px-3 py-2 rounded-md text-sm font-medium inline-flex items-center gap-1">
                            Informasi <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        <div x-show="openDropdown" x-transition.opacity
                             class="absolute left-0 mt-0 w-48 bg-white rounded-lg shadow-xl py-2 text-gray-800 border border-gray-100">
                            <a href="/program" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Program & Kegiatan</a>
                            <a href="/proyek" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Proyek Pembangunan</a>
                        </div>
                    </div>

                    <!-- Dropdown Layanan -->
                    <div class="relative" x-data="{ openDropdown: false }" @mouseenter="openDropdown = true" @mouseleave="openDropdown = false">
                        <button class="hover:text-pupr-yellow transition-colors px-3 py-2 rounded-md text-sm font-medium inline-flex items-center gap-1">
                            Publik <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        <div x-show="openDropdown" x-transition.opacity
                             class="absolute left-0 mt-0 w-56 bg-white rounded-lg shadow-xl py-2 text-gray-800 border border-gray-100">
                            <a href="/dokumen" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Dokumen & Transparansi</a>
                            <a href="/layanan" class="block px-4 py-2 text-sm hover:bg-gray-50 hover:text-pupr-blue transition">Layanan Publik</a>
                        </div>
                    </div>

                    <a href="/aduan" class="ml-4 bg-pupr-yellow text-pupr-blue-dark hover:bg-pupr-yellow-dark hover:shadow-lg transition-all transform hover:-translate-y-0.5 px-5 py-2.5 rounded-full text-sm font-bold shadow-md">
                        <i class="fa-solid fa-headset mr-2"></i> Pengaduan
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" class="text-white hover:text-pupr-yellow focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl" x-show="!open"></i>
                        <i class="fa-solid fa-xmark text-2xl" x-show="open" x-cloak></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition x-cloak class="md:hidden bg-pupr-blue-dark text-white shadow-xl border-t border-white/10">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="/" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-white/10">Beranda</a>
                <a href="/profil" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-white/10">Profil</a>
                <div x-data="{ openBerita: false }">
                    <button @click="openBerita = !openBerita" class="w-full text-left px-3 py-3 rounded-md text-base font-medium hover:bg-white/10 flex justify-between items-center">
                        Berita & Informasi <i class="fa-solid" :class="openBerita ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div x-show="openBerita" class="pl-6 space-y-1 mt-1 pb-2">
                        <a href="/berita" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10">Semua Berita</a>
                        <a href="/berita?divisi=bina-marga" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10">Divisi Bina Marga</a>
                        <a href="/berita?divisi=cipta-karya" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10">Divisi Cipta Karya</a>
                        <a href="/berita?divisi=sda" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10">Divisi SDA</a>
                        <a href="/berita?divisi=tata-ruang" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10">Divisi Tata Ruang</a>
                    </div>
                </div>
                <a href="/program" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-white/10">Program & Kegiatan</a>
                <a href="/proyek" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-white/10">Proyek Pembangunan</a>
                <a href="/galeri" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-white/10">Galeri</a>
                <a href="/dokumen" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-white/10">Dokumen Publik</a>
                <a href="/aduan" class="block px-3 py-3 mt-4 text-center rounded-md text-base font-bold bg-pupr-yellow text-pupr-blue">Buat Pengaduan</a>
            </div>
        </div>
    </nav>

    <!-- Main Content (padded for fixed navbar) -->
    <main class="flex-grow pt-20" :class="{'grayscale contrast-125': highContrast}">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-pupr-blue-dark text-white pt-16 pb-8 border-t-4 border-pupr-yellow" :class="{'grayscale contrast-125': highContrast}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 flex items-center justify-center">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Logo PUPR" class="w-full object-contain">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl text-white">Dinas Pekerjaan Umum</span>
                            <span class="font-bold text-xl text-white -mt-1">dan Penataan Ruang</span>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">Mewujudkan infrastruktur pekerjaan umum dan perumahan rakyat yang handal dan terpadu dalam mendukung terwujudnya Kabupaten Bombana yang sejahtera.</p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/search/top/?q=Dinas%20Pekerjaan%20Umum%20dan%20Penataan%20Ruang%20Kabupaten%20Bombana" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-pupr-yellow hover:text-pupr-blue transition-all" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/dinaspupr_bombana" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-pupr-yellow hover:text-pupr-blue transition-all" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="mailto:pubombana@yahoo.com" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-pupr-yellow hover:text-pupr-blue transition-all" title="Email"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-pupr-yellow mb-4">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="/profil" class="text-gray-400 hover:text-white transition"><i class="fa-solid fa-angle-right text-xs mr-2 text-pupr-yellow"></i>Profil Dinas</a></li>
                        <li><a href="/berita" class="text-gray-400 hover:text-white transition"><i class="fa-solid fa-angle-right text-xs mr-2 text-pupr-yellow"></i>Berita Terbaru</a></li>
                        <li><a href="/dokumen" class="text-gray-400 hover:text-white transition"><i class="fa-solid fa-angle-right text-xs mr-2 text-pupr-yellow"></i>Transparansi Anggaran</a></li>
                        <li><a href="/aduan" class="text-gray-400 hover:text-white transition"><i class="fa-solid fa-angle-right text-xs mr-2 text-pupr-yellow"></i>Layanan Pengaduan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-pupr-yellow mb-4">Kontak Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot mt-1 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">Jl. Jenderal Sudirman No. 1, Rumbia, Kabupaten Bombana, Sulawesi Tenggara</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-gray-400"></i>
                            <span class="text-gray-400 text-sm">(0409) 123456</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-gray-400"></i>
                            <span class="text-gray-400 text-sm">info@pupr.bombanakab.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/10 pt-8 text-center md:flex md:justify-between md:items-center">
                <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Dinas PUPR Kabupaten Bombana. Hak Cipta Dilindungi.</p>
                <p class="text-sm text-gray-500 mt-2 md:mt-0">Made With Love by Smart Inovasi.</p>
            </div>
        </div>
    </footer>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Floating WhatsApp Widget -->
    <a href="https://wa.me/6281342482169" target="_blank" class="fixed bottom-6 right-6 z-50 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center text-3xl shadow-lg hover:bg-green-600 hover:scale-110 transition-all duration-300" :class="{'grayscale contrast-125': highContrast}" title="Hubungi Kami via WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Accessibility Menu Widget -->
    <div x-data="{ openAccess: false }" class="fixed bottom-24 right-6 z-50" :class="{'grayscale contrast-125': highContrast}">
        <div x-show="openAccess" x-transition.opacity.duration.300ms @click.away="openAccess = false" class="absolute bottom-16 right-0 bg-white rounded-2xl shadow-2xl border border-gray-100 p-4 w-64 mb-2">
            <h4 class="font-bold text-pupr-blue mb-3 text-sm border-b pb-2">Menu Aksesibilitas</h4>
            <div class="space-y-3">
                <button @click="largeText = !largeText" class="w-full text-left flex items-center justify-between text-sm hover:bg-gray-50 p-2 rounded-lg transition-colors">
                    <span class="font-medium text-gray-700">Teks Lebih Besar</span>
                    <i class="fa-solid fa-text-height text-pupr-blue" :class="{'text-pupr-yellow': largeText}"></i>
                </button>
                <button @click="highContrast = !highContrast" class="w-full text-left flex items-center justify-between text-sm hover:bg-gray-50 p-2 rounded-lg transition-colors">
                    <span class="font-medium text-gray-700">Kontras Tinggi</span>
                    <i class="fa-solid fa-circle-half-stroke text-pupr-blue" :class="{'text-pupr-yellow': highContrast}"></i>
                </button>
            </div>
        </div>
        <button @click="openAccess = !openAccess" class="bg-pupr-blue text-white w-14 h-14 rounded-full flex items-center justify-center text-2xl shadow-lg hover:bg-pupr-blue-dark hover:scale-110 transition-all duration-300 border-2 border-white/20" title="Menu Aksesibilitas">
            <i class="fa-solid fa-universal-access"></i>
        </button>
    </div>

    <!-- Scroll to Top Button -->
    <button x-data="{ show: false }"
            @scroll.window="show = window.pageYOffset > 500"
            x-show="show"
            x-transition.opacity.duration.300ms
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="fixed bottom-[10.5rem] right-6 z-50 bg-pupr-yellow text-pupr-blue-dark w-14 h-14 rounded-full flex items-center justify-center text-2xl shadow-lg hover:bg-pupr-yellow-dark hover:scale-110 transition-all duration-300 border-2 border-white/20"
            :class="{'grayscale contrast-125': highContrast}"
            title="Kembali ke Atas"
            x-cloak>
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                once: true, // whether animation should happen only once - while scrolling down
                offset: 100, // offset (in px) from the original trigger point
                duration: 800, // values from 0 to 3000, with step 50ms
                easing: 'ease-out-cubic', // default easing for AOS animations
            });
        });
    </script>
</body>
</html>
