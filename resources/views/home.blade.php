@extends('layouts.app')

@section('title', 'Beranda - Dinas PUPR Kabupaten Bombana')

@section('content')

<!-- Hero Section -->
@if(isset($heroCarousels) && $heroCarousels->count() > 0)
<div x-data="{ 
        activeSlide: 1, 
        slidesCount: {{ $heroCarousels->count() }},
        timer: null, 
        startTimer() { 
            this.timer = setInterval(() => { 
                this.next(); 
            }, 6000) 
        }, 
        next() {
            this.activeSlide = this.activeSlide === this.slidesCount ? 1 : this.activeSlide + 1;
        },
        prev() {
            this.activeSlide = this.activeSlide === 1 ? this.slidesCount : this.activeSlide - 1;
        },
        resetTimer() { 
            clearInterval(this.timer); 
            this.startTimer(); 
        } 
    }" 
    x-init="startTimer()" 
    class="relative w-full h-[250px] sm:h-[400px] md:h-[500px] lg:h-[600px] overflow-hidden group bg-gray-900">
    
    @foreach($heroCarousels as $index => $carousel)
    <div x-show="activeSlide === {{ $index + 1 }}"
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-1000 absolute inset-0 z-0"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="absolute inset-0 w-full h-full"
         style="display: {{ $index === 0 ? 'block' : 'none' }};">
         
        @if($carousel->link)
            <a href="{{ $carousel->link }}" class="block w-full h-full">
        @endif
        
        <img src="{{ asset('storage/'.$carousel->image) }}" alt="{{ $carousel->title ?? 'Hero Image' }}" class="w-full h-full object-cover object-center">
        
        <!-- Optional overlay if there's a title but no baked-in text -->
        @if($carousel->title)
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-8 sm:bottom-12 md:bottom-16 left-0 right-0 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left">
                <h2 class="text-xl sm:text-3xl md:text-5xl font-bold text-white drop-shadow-lg">{{ $carousel->title }}</h2>
            </div>
        @endif

        @if($carousel->link)
            </a>
        @endif
    </div>
    @endforeach

    <!-- Navigation Arrows -->
    <button @click="prev(); resetTimer()" class="absolute left-4 md:left-8 top-1/2 transform -translate-y-1/2 bg-black/20 hover:bg-black/50 text-white w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 z-10 focus:outline-none backdrop-blur-sm">
        <i class="fa-solid fa-chevron-left text-xl"></i>
    </button>
    <button @click="next(); resetTimer()" class="absolute right-4 md:right-8 top-1/2 transform -translate-y-1/2 bg-black/20 hover:bg-black/50 text-white w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 z-10 focus:outline-none backdrop-blur-sm">
        <i class="fa-solid fa-chevron-right text-xl"></i>
    </button>

    <!-- Pagination Dots -->
    <div class="absolute bottom-3 md:bottom-6 left-0 right-0 flex justify-center gap-2 md:gap-3 z-10">
        @foreach($heroCarousels as $index => $carousel)
        <button @click="activeSlide = {{ $index + 1 }}; resetTimer()" 
                :class="{'w-10 bg-pupr-yellow': activeSlide === {{ $index + 1 }}, 'w-3 bg-white/50 hover:bg-white/80': activeSlide !== {{ $index + 1 }}}" 
                class="h-3 rounded-full transition-all duration-300 focus:outline-none shadow-sm"></button>
        @endforeach
    </div>
</div>
@else
<!-- Fallback Static Hero -->
<div class="relative bg-pupr-blue overflow-hidden min-h-[600px] flex items-center">
    <!-- Abstract Background Patterns -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full border-[20px] border-pupr-yellow"></div>
        <div class="absolute top-1/2 left-0 transform -translate-x-1/2 w-64 h-64 rounded-full border-[15px] border-white"></div>
        <div class="absolute bottom-0 right-1/4 w-full h-1/2 bg-gradient-to-t from-pupr-blue-dark to-transparent"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block py-1 px-3 rounded-full bg-pupr-yellow/20 text-pupr-yellow border border-pupr-yellow/30 font-semibold text-sm mb-6 shadow-sm backdrop-blur-sm animate-pulse">Selamat Datang di Website Resmi</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Infrastruktur Handal, <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pupr-yellow to-yellow-200">Bombana Sejahtera</span>
                </h1>
                <p class="text-lg text-gray-200 mb-8 max-w-xl font-light">
                    Mewujudkan infrastruktur pekerjaan umum dan penataan ruang yang terpadu, berkualitas, dan berkelanjutan untuk masyarakat Kabupaten Bombana.
                </p>
            </div>
            
            <div class="hidden lg:flex relative w-full h-[600px] justify-center items-end pb-4">
                <!-- Decorative background elements -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-pupr-yellow rounded-full blur-3xl opacity-30 z-0"></div>
                
                <!-- Unified Border Container -->
                <div class="relative z-10 w-full max-w-[420px] h-[550px] rounded-[2rem] border-2 border-white/20 bg-white/5 backdrop-blur-sm shadow-2xl overflow-hidden flex flex-col justify-end group hover:border-pupr-yellow/50 transition-colors duration-500">
                    
                    <!-- Kadin Image (Large) -->
                    <img src="{{ $settings['foto_kadin'] ?? asset('images/kadinhd.png') }}" alt="Kepala Dinas" class="absolute inset-0 h-full w-full object-cover object-top drop-shadow-2xl z-0 transition-transform duration-700 group-hover:scale-105">
                    
                    <!-- Gradient overlay for text readability -->
                    <div class="absolute bottom-0 left-0 right-0 h-3/5 bg-gradient-to-t from-pupr-blue-dark via-pupr-blue-dark/90 to-transparent z-10"></div>
                    
                    <!-- Text Content -->
                    <div class="relative z-20 p-8 text-center flex flex-col items-center">
                        <div class="w-12 h-1 bg-pupr-yellow rounded-full mb-4"></div>
                        <h3 class="text-2xl font-bold text-white mb-1">{{ $settings['nama_kadin'] ?? 'Ir. Ishak, S.T., M.T.' }}</h3>
                        <p class="text-pupr-yellow text-sm font-medium mb-4 uppercase tracking-wider">Kepala Dinas PUPR Bombana</p>
                        
                        <div class="relative">
                            <i class="fa-solid fa-quote-left text-3xl text-white/10 absolute -top-4 -left-2"></i>
                            <p class="text-gray-200 italic text-sm line-clamp-3 relative z-10">
                                "{{ $settings['sambutan_kadin'] ?? 'Selamat datang di website resmi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Bombana. Melalui portal ini, kami berkomitmen untuk memberikan transparansi informasi pembangunan dan layanan publik yang prima.' }}"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Statistik Pembangunan -->
<div data-aos="fade-up" class="bg-white py-16 mt-4 relative z-20 shadow-xl mx-4 sm:mx-6 lg:mx-8 rounded-2xl max-w-7xl xl:mx-auto border-b-4 border-pupr-yellow">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 px-8">
        <div class="text-center group" x-data="{ count: 0, target: {{ $stats['proyek_selesai'] ?? 0 }} }" x-intersect.once="let int = setInterval(() => { if(count < target) { let step = Math.ceil(target/50); count = Math.min(count + step, target); } else clearInterval(int); }, 30)">
            <div class="w-16 h-16 mx-auto bg-blue-50 text-pupr-blue rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:bg-pupr-blue group-hover:text-white transition-colors shadow-sm">
                <i class="fa-solid fa-building-circle-check"></i>
            </div>
            <h4 class="text-4xl font-extrabold text-gray-800 mb-1" x-text="count">0</h4>
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Proyek Selesai</p>
        </div>
        <div class="text-center group" x-data="{ count: 0, target: {{ $stats['proyek_berjalan'] ?? 0 }} }" x-intersect.once="let int = setInterval(() => { if(count < target) { let step = Math.ceil(target/50); count = Math.min(count + step, target); } else clearInterval(int); }, 30)">
            <div class="w-16 h-16 mx-auto bg-blue-50 text-pupr-blue rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:bg-pupr-blue group-hover:text-white transition-colors shadow-sm">
                <i class="fa-solid fa-person-digging"></i>
            </div>
            <h4 class="text-4xl font-extrabold text-gray-800 mb-1" x-text="count">0</h4>
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Proyek Berjalan</p>
        </div>
        <div class="text-center group" x-data="{ count: 0, target: {{ $stats['program_aktif'] ?? 0 }} }" x-intersect.once="let int = setInterval(() => { if(count < target) { let step = Math.ceil(target/50); count = Math.min(count + step, target); } else clearInterval(int); }, 30)">
            <div class="w-16 h-16 mx-auto bg-blue-50 text-pupr-blue rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:bg-pupr-blue group-hover:text-white transition-colors shadow-sm">
                <i class="fa-solid fa-list-check"></i>
            </div>
            <h4 class="text-4xl font-extrabold text-gray-800 mb-1" x-text="count">0</h4>
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Program Aktif</p>
        </div>
        <div class="text-center group" x-data="{ count: 0, target: {{ $stats['pengaduan_masuk'] ?? 0 }} }" x-intersect.once="let int = setInterval(() => { if(count < target) { let step = Math.ceil(target/50); count = Math.min(count + step, target); } else clearInterval(int); }, 30)">
            <div class="w-16 h-16 mx-auto bg-blue-50 text-pupr-blue rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:bg-pupr-blue group-hover:text-white transition-colors shadow-sm">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
            <h4 class="text-4xl font-extrabold text-gray-800 mb-1" x-text="count">0</h4>
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Aduan Masuk</p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-pupr-blue">Akses Cepat</h2>
            <div class="w-24 h-1 bg-pupr-yellow mx-auto mt-4 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="/dokumen" data-aos="fade-up" data-aos-delay="0" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all group flex flex-col items-center text-center border border-gray-100 hover:border-pupr-yellow">
                <div class="w-14 h-14 bg-blue-50 text-pupr-blue rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
                <h3 class="font-bold text-gray-800 group-hover:text-pupr-blue transition-colors">Transparansi</h3>
                <p class="text-xs text-gray-500 mt-2">Dokumen Anggaran & Perencanaan</p>
            </a>
            <a href="/layanan" data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all group flex flex-col items-center text-center border border-gray-100 hover:border-pupr-yellow">
                <div class="w-14 h-14 bg-blue-50 text-pupr-blue rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <h3 class="font-bold text-gray-800 group-hover:text-pupr-blue transition-colors">Layanan Publik</h3>
                <p class="text-xs text-gray-500 mt-2">Permohonan Data & Informasi</p>
            </a>
            <a href="/proyek" data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all group flex flex-col items-center text-center border border-gray-100 hover:border-pupr-yellow">
                <div class="w-14 h-14 bg-blue-50 text-pupr-blue rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <h3 class="font-bold text-gray-800 group-hover:text-pupr-blue transition-colors">Peta Proyek</h3>
                <p class="text-xs text-gray-500 mt-2">Sebaran Proyek Pembangunan</p>
            </a>
            <a href="/aduan" data-aos="fade-up" data-aos-delay="300" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all group flex flex-col items-center text-center border border-gray-100 hover:border-pupr-yellow">
                <div class="w-14 h-14 bg-yellow-50 text-pupr-yellow-dark rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h3 class="font-bold text-gray-800 group-hover:text-pupr-yellow-dark transition-colors">Pengaduan</h3>
                <p class="text-xs text-gray-500 mt-2">Laporkan Keluhan Infrastruktur</p>
            </a>
        </div>
    </div>
</div>

<!-- Profil Singkat -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-pupr-yellow font-bold tracking-wider uppercase text-sm">Profil Instansi</span>
            <h2 class="text-3xl font-extrabold text-pupr-blue mt-2">Mengenal Lebih Dekat</h2>
            <div class="w-24 h-1 bg-pupr-yellow mx-auto mt-4 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-pupr-blue">Sejarah & Peran Dinas PUPR Bombana</h3>
                <p class="text-gray-600 text-lg leading-relaxed text-justify">
                    Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Bombana dibentuk sebagai unsur pelaksana urusan pemerintahan daerah di bidang infrastruktur fisik dan tata ruang. Kami terus bertransformasi mengimbangi kemajuan teknologi konstruksi dan tuntutan tata kelola pemerintahan yang transparan.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed text-justify">
                    Hingga saat ini, komitmen kami tetap teguh untuk mewujudkan pembangunan infrastruktur yang merata, berkualitas, serta berwawasan lingkungan.
                </p>
                <div class="pt-4">
                    <a href="/profil" class="bg-pupr-blue text-white hover:bg-pupr-blue-dark px-6 py-3 rounded-xl font-bold transition-colors shadow-md inline-flex items-center">
                        Lihat Profil Lengkap <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-1" data-aos="fade-left">
                <div x-data="{ activeSlide: 1, timer: null, startTimer() { this.timer = setInterval(() => { this.activeSlide = this.activeSlide === 1 ? 2 : 1 }, 5000) }, resetTimer() { clearInterval(this.timer); this.startTimer(); } }" x-init="startTimer()" class="bg-pupr-blue text-white p-8 rounded-2xl shadow-xl border-t-4 border-pupr-yellow relative overflow-hidden flex flex-col min-h-[300px]">
                    <div class="relative flex-1">
                        <!-- Visi Slide -->
                        <div x-show="activeSlide === 1" 
                             x-transition:enter="transition ease-out duration-500" 
                             x-transition:enter-start="opacity-0 translate-x-8" 
                             x-transition:enter-end="opacity-100 translate-x-0" 
                             x-transition:leave="transition ease-in duration-300 absolute top-0 left-0 w-full" 
                             x-transition:leave-start="opacity-100 translate-x-0" 
                             x-transition:leave-end="opacity-0 -translate-x-8" 
                             class="w-full">
                            <h3 class="font-bold text-2xl mb-4 text-pupr-yellow">Visi</h3>
                            <p class="mb-6 text-sm italic leading-relaxed text-gray-100">
                                "Terwujudnya Infrastruktur Pekerjaan Umum dan Penataan Ruang yang Handal, Terpadu, dan Berkelanjutan untuk Mendukung Perekonomian dan Kesejahteraan Masyarakat Kabupaten Bombana."
                            </p>
                        </div>

                        <!-- Misi Slide -->
                        <div x-show="activeSlide === 2" style="display: none;"
                             x-transition:enter="transition ease-out duration-500 delay-100" 
                             x-transition:enter-start="opacity-0 translate-x-8" 
                             x-transition:enter-end="opacity-100 translate-x-0" 
                             x-transition:leave="transition ease-in duration-300 absolute top-0 left-0 w-full" 
                             x-transition:leave-start="opacity-100 translate-x-0" 
                             x-transition:leave-end="opacity-0 -translate-x-8" 
                             class="w-full">
                            <h3 class="font-bold text-2xl mb-4 text-pupr-yellow">Misi</h3>
                            <ul class="space-y-3 text-sm leading-relaxed text-gray-100">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-pupr-yellow mt-1"></i>
                                    <span>Meningkatkan kuantitas & kualitas jaringan jalan dan jembatan secara merata.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-pupr-yellow mt-1"></i>
                                    <span>Mengelola sistem irigasi, rawa, & SDA lainnya secara efektif.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-pupr-yellow mt-1"></i>
                                    <span>Meningkatkan pelayanan infrastruktur dasar permukiman.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-pupr-yellow mt-1"></i>
                                    <span>Mewujudkan penataan ruang yang tertib, aman, & berwawasan lingkungan.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Navigation Dots -->
                    <div class="mt-6 flex gap-2 items-center">
                        <button @click="activeSlide = 1; resetTimer()" :class="{'w-8 bg-pupr-yellow': activeSlide === 1, 'w-2 bg-gray-400 hover:bg-gray-300': activeSlide !== 1}" class="h-2 rounded-full transition-all duration-300 focus:outline-none"></button>
                        <button @click="activeSlide = 2; resetTimer()" :class="{'w-8 bg-pupr-yellow': activeSlide === 2, 'w-2 bg-gray-400 hover:bg-gray-300': activeSlide !== 2}" class="h-2 rounded-full transition-all duration-300 focus:outline-none"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Layanan Publik -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-pupr-yellow font-bold tracking-wider uppercase text-sm">Layanan Kami</span>
            <h2 class="text-3xl font-extrabold text-pupr-blue mt-2">Layanan Publik & Perizinan</h2>
            <div class="w-24 h-1 bg-pupr-yellow mx-auto mt-4 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-pupr-yellow hover:shadow-xl transition-shadow flex flex-col">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Izin Mendirikan Bangunan (IMB) / PBG</h3>
                <p class="text-gray-600 text-sm mb-6 flex-grow">Informasi dan panduan mengenai syarat, prosedur, dan tata cara pengurusan Persetujuan Bangunan Gedung (PBG).</p>
                <a href="/layanan" class="text-pupr-blue text-sm font-semibold hover:underline inline-flex items-center">Lebih Lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-pupr-blue hover:shadow-xl transition-shadow flex flex-col">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Layanan Pengujian Material</h3>
                <p class="text-gray-600 text-sm mb-6 flex-grow">Layanan UPTD Laboratorium Konstruksi untuk pengujian aspal, beton, tanah, dan material infrastruktur lainnya.</p>
                <a href="/layanan" class="text-pupr-blue text-sm font-semibold hover:underline inline-flex items-center">Lebih Lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-pupr-blue hover:shadow-xl transition-shadow flex flex-col">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Rekomendasi Tata Ruang</h3>
                <p class="text-gray-600 text-sm mb-6 flex-grow">Pengajuan dan penerbitan rekomendasi kesesuaian kegiatan pemanfaatan ruang (KKPR) di wilayah Kabupaten Bombana.</p>
                <a href="/layanan" class="text-pupr-blue text-sm font-semibold hover:underline inline-flex items-center">Lebih Lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-pupr-yellow hover:shadow-xl transition-shadow flex flex-col">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Sewa Alat Berat</h3>
                <p class="text-gray-600 text-sm mb-6 flex-grow">Informasi penyewaan alat berat milik UPTD Alat Berat Dinas PUPR untuk keperluan proyek maupun pribadi.</p>
                <a href="/layanan" class="text-pupr-blue text-sm font-semibold hover:underline inline-flex items-center">Lebih Lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Highlight Program -->
@if($highlightPrograms->count() > 0)
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-pupr-yellow font-bold tracking-wider uppercase text-sm">Program Unggulan</span>
                <h2 class="text-3xl font-extrabold text-pupr-blue mt-2">Fokus Pembangunan Kami</h2>
            </div>
            <a href="/program" class="hidden md:inline-flex items-center text-pupr-blue font-bold hover:text-pupr-yellow transition-colors group">
                Lihat Semua Program <i class="fa-solid fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($highlightPrograms as $program)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-shadow overflow-hidden group border border-gray-100">
                <div class="h-56 overflow-hidden relative">
                    <img src="{{ $program->image ? asset('storage/'.$program->image) : 'https://placehold.co/600x400/0b3b60/FFF?text=Program+PUPR' }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <span class="bg-pupr-yellow text-pupr-blue-dark text-xs font-bold px-3 py-1 rounded-full">{{ strtoupper($program->category) }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-pupr-blue transition-colors line-clamp-2">
                        <a href="{{ route('berita.show', $program->slug) }}">{{ $program->title }}</a>
                    </h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-3">
                        {{ strip_tags($program->content) }}
                    </p>
                    <a href="{{ route('berita.show', $program->slug) }}" class="inline-flex items-center text-sm font-bold text-pupr-blue group-hover:text-pupr-yellow transition-colors">
                        Pelajari Lebih Lanjut <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="/program" class="inline-flex items-center text-pupr-blue font-bold hover:text-pupr-yellow transition-colors">
                Lihat Semua Program <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
@endif

<!-- Berita Terbaru -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-pupr-yellow font-bold tracking-wider uppercase text-sm">Informasi Terkini</span>
            <h2 class="text-3xl font-extrabold text-pupr-blue mt-2">Berita & Pengumuman</h2>
            <div class="w-24 h-1 bg-pupr-yellow mx-auto mt-4 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            @if($latestNews->count() > 0)
                <!-- Featured News -->
                <div data-aos="fade-up" class="bg-white rounded-3xl overflow-hidden shadow-xl group cursor-pointer relative">
                    <a href="{{ route('berita.show', $latestNews[0]->slug) }}" class="absolute inset-0 z-10"></a>
                    <div class="h-full min-h-[400px] relative">
                        <img src="{{ $latestNews[0]->image ? asset('storage/'.$latestNews[0]->image) : 'https://placehold.co/800x600/0b3b60/FFF?text=Berita+PUPR' }}" alt="{{ $latestNews[0]->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-pupr-blue-dark via-pupr-blue/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="bg-pupr-yellow text-pupr-blue-dark text-xs font-bold px-3 py-1 rounded-full">{{ strtoupper($latestNews[0]->category) }}</span>
                                <span class="text-white/80 text-sm"><i class="fa-regular fa-calendar mr-2"></i>{{ $latestNews[0]->published_at ? \Carbon\Carbon::parse($latestNews[0]->published_at)->format('d M Y') : $latestNews[0]->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-white mb-3 group-hover:text-pupr-yellow transition-colors">{{ $latestNews[0]->title }}</h3>
                            <p class="text-gray-300 line-clamp-2 text-sm">{{ strip_tags($latestNews[0]->content) }}</p>
                        </div>
                    </div>
                </div>

                <!-- List News -->
                <div class="flex flex-col space-y-6 justify-center">
                    @foreach($latestNews->skip(1) as $news)
                    <div class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex gap-5 items-center group border border-gray-100 relative">
                        <a href="{{ route('berita.show', $news->slug) }}" class="absolute inset-0 z-10"></a>
                        <div class="w-32 h-32 flex-shrink-0 rounded-xl overflow-hidden">
                            <img src="{{ $news->image ? asset('storage/'.$news->image) : 'https://placehold.co/400x300/0b3b60/FFF?text=Berita+PUPR' }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-pupr-blue text-xs font-bold">{{ strtoupper($news->category) }}</span>
                                <span class="text-gray-400 text-xs"><i class="fa-regular fa-calendar mr-1"></i>{{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('d M Y') : $news->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-pupr-blue transition-colors line-clamp-2">{{ $news->title }}</h3>
                        </div>
                    </div>
                    @endforeach
                    
                    <a href="/berita" class="text-center w-full bg-blue-50 text-pupr-blue hover:bg-pupr-blue hover:text-white py-4 rounded-2xl font-bold transition-colors shadow-sm">
                        Baca Berita Selengkapnya 
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Kontak & Alamat -->
<div class="py-16 bg-white relative overflow-hidden border-t border-gray-100">
    <div class="absolute inset-0 bg-pupr-blue/5"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" data-aos="zoom-in">
        <div class="bg-pupr-blue rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row">
            <div class="p-10 lg:w-1/2 text-white flex flex-col justify-center">
                <span class="text-pupr-yellow font-bold tracking-wider uppercase text-sm mb-2">Kunjungi Kami</span>
                <h2 class="text-3xl font-extrabold mb-8">Kantor Dinas PUPR Bombana</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0 border border-white/20">
                            <i class="fa-solid fa-location-dot text-pupr-yellow text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1 text-white">Alamat Lengkap</h4>
                            <p class="text-gray-200 leading-relaxed font-light">{{ $settings['alamat_kantor'] ?? 'Komp. Perkantoran Bupati Bombana, Lameroro, Rumbia, Kabupaten Bombana, Sulawesi Tenggara 93771' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0 border border-white/20">
                            <i class="fa-solid fa-clock text-pupr-yellow text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1 text-white">Jam Operasional</h4>
                            <p class="text-gray-200 font-light">Senin - Jumat: 08:00 - 16:00 WITA<br>Sabtu - Minggu: Tutup</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0 border border-white/20">
                            <i class="fa-solid fa-phone text-pupr-yellow text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1 text-white">Kontak</h4>
                            <p class="text-gray-200 font-light">{{ $settings['telepon'] ?? '(0409) 123456' }}<br>{{ $settings['email'] ?? 'info@pupr-bombana.go.id' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 min-h-[400px] bg-gray-200 relative">
                <!-- Fallback Map Image or Iframe -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.8907686316447!2d122.04894107503902!3d-4.788779895186565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da2e70069bad349%3A0xcfb8f2db1c3c5dc6!2sDinas%20Pekerjaan%20Umum%20dan%20Penataan%20Ruang%20Kabupaten%20Bombana!5e0!3m2!1sid!2sid!4v1782370502152!5m2!1sid!2sid" class="absolute inset-0 w-full h-full object-cover border-0" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection
