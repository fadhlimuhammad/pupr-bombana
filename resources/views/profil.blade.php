@extends('layouts.app')

@section('title', 'Profil - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="bg-pupr-blue py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Profil Instansi</h1>
        <p class="mt-4 text-xl text-pupr-yellow max-w-3xl mx-auto">Mengenal Lebih Dekat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Bombana</p>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <h2 class="text-2xl font-bold text-pupr-blue border-b-2 border-pupr-yellow inline-block pb-2 mb-6">Sejarah Singkat</h2>
                    <div class="prose prose-lg text-gray-700 max-w-none">
                        <p class="text-justify">
                            Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Bombana dibentuk sebagai unsur pelaksana urusan pemerintahan daerah di bidang infrastruktur fisik dan tata ruang. Sejak awal berdirinya Kabupaten Bombana, Dinas PUPR telah mengambil peran krusial dalam merintis dan membangun aksesibilitas wilayah, mulai dari pembukaan jalan antar-desa, pembangunan jembatan penghubung strategis, hingga pengembangan sistem drainase dan irigasi guna mendukung sektor pertanian yang menjadi salah satu urat nadi perekonomian masyarakat Bombana.
                        </p>
                        <p class="text-justify mt-4">
                            Dalam perkembangannya, Dinas PUPR terus bertransformasi mengimbangi kemajuan teknologi konstruksi dan tuntutan tata kelola pemerintahan yang transparan. Hingga saat ini, komitmen kami tetap teguh untuk mewujudkan pembangunan infrastruktur yang merata, berkualitas, serta berwawasan lingkungan agar hasil pembangunan dapat dinikmati tidak hanya oleh generasi sekarang, melainkan juga berkesinambungan bagi anak cucu di masa depan.
                        </p>
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-pupr-blue border-b-2 border-pupr-yellow inline-block pb-2 mb-6">Tugas Pokok & Fungsi</h2>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm text-gray-700">
                        <p class="mb-4 text-justify font-medium">
                            Sesuai dengan Peraturan Daerah Kabupaten Bombana, Dinas Pekerjaan Umum dan Penataan Ruang mempunyai tugas pokok melaksanakan urusan pemerintahan yang menjadi kewenangan daerah dan tugas pembantuan di bidang pekerjaan umum, penataan ruang, serta pertanahan.
                        </p>
                        <ul class="list-disc pl-6 space-y-3">
                            <li><strong class="text-pupr-blue">Perumusan Kebijakan Teknis:</strong> Merumuskan pedoman di bidang Bina Marga, Cipta Karya, Sumber Daya Air, dan Penataan Ruang sesuai rencana strategis daerah.</li>
                            <li><strong class="text-pupr-blue">Penyelenggaraan Pelayanan:</strong> Melaksanakan pelayanan umum dan eksekusi program pembangunan infrastruktur daerah secara terpadu.</li>
                            <li><strong class="text-pupr-blue">Pembinaan & Pengawasan:</strong> Melakukan evaluasi, pengendalian, dan pengawasan atas jalannya proyek-proyek fisik agar memenuhi standar kelayakan.</li>
                            <li><strong class="text-pupr-blue">Pengelolaan Administrasi:</strong> Menyusun tata kelola keuangan, administrasi kepegawaian, dan perencanaan instansi untuk mewujudkan _Good Governance_.</li>
                        </ul>
                    </div>
                </section>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-pupr-blue text-white p-8 rounded-2xl shadow-xl sticky top-28 border-t-4 border-pupr-yellow">
                    <h3 class="font-bold text-2xl mb-4 text-pupr-yellow">Visi</h3>
                    <p class="mb-8 text-lg italic leading-relaxed text-gray-100">
                        "Terwujudnya Infrastruktur Pekerjaan Umum dan Penataan Ruang yang Handal, Terpadu, dan Berkelanjutan untuk Mendukung Perekonomian dan Kesejahteraan Masyarakat Kabupaten Bombana."
                    </p>
                    
                    <h3 class="font-bold text-2xl mb-4 text-pupr-yellow">Misi</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-pupr-yellow mt-1 text-lg"></i>
                            <span class="text-sm">Meningkatkan kuantitas dan kualitas jaringan jalan dan jembatan secara merata.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-pupr-yellow mt-1 text-lg"></i>
                            <span class="text-sm">Mengembangkan dan mengelola sistem irigasi, rawa, dan sumber daya air lainnya secara efektif.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-pupr-yellow mt-1 text-lg"></i>
                            <span class="text-sm">Meningkatkan pelayanan infrastruktur dasar permukiman (air minum, sanitasi, dan bangunan gedung).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-pupr-yellow mt-1 text-lg"></i>
                            <span class="text-sm">Mewujudkan penataan ruang wilayah yang tertib, aman, dan berwawasan lingkungan.</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Struktur Organisasi -->
        <div class="mt-24 pt-12 border-t border-gray-100">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-pupr-blue inline-block">Bagan Struktur Organisasi</h2>
                <div class="h-1.5 w-24 bg-pupr-yellow mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Susunan hierarki Pejabat Struktural pada Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Bombana yang bertugas melayani masyarakat dengan sepenuh hati.</p>
            </div>

            <!-- Org Chart Wrapper -->
            <div class="flex flex-col items-center">
                
                @if(isset($pejabats[1]) && $pejabats[1]->count() > 0)
                <!-- Kepala Dinas (Level 1) -->
                @foreach($pejabats[1] as $pejabat)
                <div class="bg-pupr-blue text-white w-72 p-5 rounded-2xl shadow-lg text-center relative z-10 border-b-4 border-pupr-yellow transform transition hover:-translate-y-1">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center mb-3 overflow-hidden border-4 border-white shadow-inner">
                        @if($pejabat->foto)
                            <img src="{{ asset('storage/' . $pejabat->foto) }}" alt="{{ $pejabat->nama }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user-tie text-4xl text-pupr-blue"></i>
                        @endif
                    </div>
                    <div class="font-bold text-xl">{{ $pejabat->jabatan }}</div>
                    <div class="text-sm text-pupr-yellow mt-1 font-medium">{{ $pejabat->nama }}</div>
                </div>
                @endforeach
                @endif

                @if(isset($pejabats[2]) && $pejabats[2]->count() > 0)
                <div class="h-8 w-1 bg-gray-300"></div>

                <!-- Sekretaris (Level 2) -->
                @foreach($pejabats[2] as $pejabat)
                <div class="bg-white text-pupr-blue border-2 border-pupr-blue w-72 p-5 rounded-xl shadow-md text-center relative z-10 hover:bg-gray-50 transition">
                    <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3 overflow-hidden border-2 border-gray-200">
                        @if($pejabat->foto)
                            <img src="{{ asset('storage/' . $pejabat->foto) }}" alt="{{ $pejabat->nama }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-3xl text-gray-400"></i>
                        @endif
                    </div>
                    <div class="font-bold text-lg">{{ $pejabat->jabatan }}</div>
                    <div class="text-sm text-gray-600 mt-1">{{ $pejabat->nama }}</div>
                </div>
                @endforeach
                @endif

                @if(isset($pejabats[3]) && $pejabats[3]->count() > 0)
                <div class="h-8 w-1 bg-gray-300"></div>
                <div class="w-full max-w-4xl border-t-2 border-gray-300 hidden md:block"></div>
                <div class="h-8 w-1 bg-gray-300 hidden md:block"></div>

                <!-- Bidang-Bidang (Level 3) -->
                <div class="w-full max-w-6xl flex flex-wrap justify-center gap-6 relative z-10">
                    @foreach($pejabats[3] as $pejabat)
                    <div class="w-full md:w-64 bg-white border border-gray-200 p-6 rounded-xl shadow-sm text-center hover:shadow-xl hover:border-pupr-blue transition-all group flex flex-col items-center">
                        <div class="w-20 h-20 mx-auto bg-gray-50 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform overflow-hidden border-2 border-transparent group-hover:border-pupr-blue">
                            @if($pejabat->foto)
                                <img src="{{ asset('storage/' . $pejabat->foto) }}" alt="{{ $pejabat->nama }}" class="w-full h-full object-cover">
                            @else
                                <i class="fa-solid fa-user-gear text-2xl text-gray-400"></i>
                            @endif
                        </div>
                        <div class="font-bold text-pupr-blue text-md mb-2">{{ $pejabat->jabatan }}</div>
                        <div class="text-sm text-gray-500 border-t pt-2 mt-auto w-full"><span class="font-medium text-gray-800">{{ $pejabat->nama }}</span></div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection
