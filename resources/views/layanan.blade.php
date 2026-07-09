@extends('layouts.app')

@section('title', 'Layanan Publik - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="bg-pupr-blue py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Layanan Publik</h1>
        <p class="mt-3 text-xl text-gray-200">Informasi standar layanan dan perizinan terkait Dinas PUPR.</p>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-8 border-l-4 border-pupr-yellow">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Izin Mendirikan Bangunan (IMB) / PBG</h3>
                <p class="text-gray-600 mb-4">Informasi dan panduan mengenai syarat, prosedur, dan tata cara pengurusan Persetujuan Bangunan Gedung (PBG).</p>
                <a href="#" class="text-pupr-blue font-semibold hover:underline">Lihat Persyaratan &rarr;</a>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-8 border-l-4 border-pupr-blue">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Layanan Pengujian Material</h3>
                <p class="text-gray-600 mb-4">Layanan UPTD Laboratorium Konstruksi untuk pengujian aspal, beton, tanah, dan material infrastruktur lainnya.</p>
                <a href="#" class="text-pupr-blue font-semibold hover:underline">Lihat Persyaratan &rarr;</a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 border-l-4 border-pupr-blue">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Rekomendasi Tata Ruang</h3>
                <p class="text-gray-600 mb-4">Pengajuan dan penerbitan rekomendasi kesesuaian kegiatan pemanfaatan ruang (KKPR) di wilayah Kabupaten Bombana.</p>
                <a href="#" class="text-pupr-blue font-semibold hover:underline">Lihat Persyaratan &rarr;</a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 border-l-4 border-pupr-yellow">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Sewa Alat Berat</h3>
                <p class="text-gray-600 mb-4">Informasi penyewaan alat berat milik UPTD Alat Berat Dinas PUPR untuk keperluan proyek maupun pribadi.</p>
                <a href="#" class="text-pupr-blue font-semibold hover:underline">Lihat Persyaratan &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
