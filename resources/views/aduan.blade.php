@extends('layouts.app')

@section('title', 'Layanan Aduan - Dinas PUPR Kabupaten Bombana, Sulawesi Tenggara')

@section('content')
<div class="bg-pupr-blue py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Layanan Aduan Masyarakat</h1>
        <p class="mt-3 text-xl text-gray-200">Sampaikan keluhan dan laporan terkait infrastruktur di wilayah Anda.</p>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-sm" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-pupr-yellow">
            <form action="{{ route('aduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-8">
                    
                    <!-- A. Data Pelapor -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">A. Data Pelapor</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="sender_name" class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="sender_name" id="sender_name" required value="{{ old('sender_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                @error('sender_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="sender_phone" class="block text-sm font-medium text-gray-700">Nomor HP / WhatsApp <span class="text-red-500">*</span></label>
                                <input type="tel" name="sender_phone" id="sender_phone" required value="{{ old('sender_phone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                @error('sender_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="sender_email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="sender_email" id="sender_email" value="{{ old('sender_email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                @error('sender_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- B. Informasi Aduan -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">B. Informasi Aduan</h3>
                        <div class="space-y-6">
                            <div>
                                <label for="report_date" class="block text-sm font-medium text-gray-700">Tanggal Pengaduan <span class="text-red-500">*</span></label>
                                <input type="date" name="report_date" id="report_date" required value="{{ old('report_date', date('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                @error('report_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md border">
                                <h4 class="text-sm font-semibold text-gray-700 mb-3">Lokasi Kejadian</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="md:col-span-2">
                                        <label for="street" class="block text-sm font-medium text-gray-700">Jalan/Kelurahan <span class="text-red-500">*</span></label>
                                        <input type="text" name="street" id="street" required value="{{ old('street') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                        @error('street') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan <span class="text-red-500">*</span></label>
                                        <input type="text" name="district" id="district" required value="{{ old('district') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                        @error('district') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700">Kabupaten/Kota <span class="text-red-500">*</span></label>
                                        <input type="text" name="city" id="city" required value="{{ old('city') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                        @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="complaint_type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Aduan <span class="text-red-500">*</span></label>
                                <select name="complaint_type" id="complaint_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border">
                                    <option value="">-- Pilih Jenis Aduan --</option>
                                    <option value="Jalan Rusak" {{ old('complaint_type') == 'Jalan Rusak' ? 'selected' : '' }}>Jalan Rusak</option>
                                    <option value="Drainase Tersumbat/Rusak" {{ old('complaint_type') == 'Drainase Tersumbat/Rusak' ? 'selected' : '' }}>Drainase Tersumbat/Rusak</option>
                                    <option value="Jembatan Rusak" {{ old('complaint_type') == 'Jembatan Rusak' ? 'selected' : '' }}>Jembatan Rusak</option>
                                    <option value="Banjir" {{ old('complaint_type') == 'Banjir' ? 'selected' : '' }}>Banjir</option>
                                    <option value="Bangunan Gedung" {{ old('complaint_type') == 'Bangunan Gedung' ? 'selected' : '' }}>Bangunan Gedung</option>
                                    <option value="Irigasi" {{ old('complaint_type') == 'Irigasi' ? 'selected' : '' }}>Irigasi</option>
                                    <option value="Penerangan Jalan" {{ old('complaint_type') == 'Penerangan Jalan' ? 'selected' : '' }}>Penerangan Jalan</option>
                                    <option value="Lainnya" {{ old('complaint_type') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('complaint_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- C. Uraian Aduan -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">C. Uraian Aduan</h3>
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Jelaskan permasalahan yang terjadi secara rinci <span class="text-red-500">*</span></label>
                            <textarea name="content" id="content" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border" placeholder="Jelaskan detail permasalahan...">{{ old('content') }}</textarea>
                            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- D. Lampiran -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">D. Lampiran (Opsional)</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Foto Lokasi (Maks 5MB)</label>
                                <input type="file" name="photo" id="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pupr-blue-light file:text-white hover:file:bg-pupr-blue">
                                @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="video" class="block text-sm font-medium text-gray-700">Video (Maks 20MB)</label>
                                <input type="file" name="video" id="video" accept="video/mp4,video/avi,video/quicktime" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pupr-blue-light file:text-white hover:file:bg-pupr-blue">
                                @error('video') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="document" class="block text-sm font-medium text-gray-700">Dokumen Pendukung Lainnya (PDF/Word/Excel, Maks 10MB)</label>
                                <input type="file" name="document" id="document" accept=".pdf,.doc,.docx,.xls,.xlsx" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pupr-blue-light file:text-white hover:file:bg-pupr-blue">
                                @error('document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- E. Harapan/Tindak Lanjut -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">E. Harapan/Tindak Lanjut</h3>
                        <div>
                            <label for="expectation" class="block text-sm font-medium text-gray-700">Tindak Lanjut yang Diminta</label>
                            <textarea name="expectation" id="expectation" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pupr-blue focus:ring-pupr-blue sm:text-sm p-3 border" placeholder="Contoh: Mohon segera diperbaiki karena sering terjadi kecelakaan...">{{ old('expectation') }}</textarea>
                            @error('expectation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="pt-4 border-t">
                        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-lg font-bold text-pupr-blue bg-pupr-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pupr-yellow transition">
                            Kirim Form Aduan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
