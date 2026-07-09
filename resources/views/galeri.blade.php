@extends('layouts.app')

@section('title', 'Galeri - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="bg-pupr-blue py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Galeri Kegiatan & Proyek</h1>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="columns-1 sm:columns-2 md:columns-3 gap-6 space-y-6" x-data="{ lightboxOpen: false, lightboxImage: '', lightboxTitle: '', openLightbox(img, title) { this.lightboxImage = img; this.lightboxTitle = title; this.lightboxOpen = true; document.body.style.overflow = 'hidden'; }, closeLightbox() { this.lightboxOpen = false; document.body.style.overflow = ''; } }">
            @forelse($galleries as $gallery)
            <div class="break-inside-avoid bg-white rounded-lg shadow-md overflow-hidden group relative cursor-pointer" @click="openLightbox('{{ asset('storage/' . $gallery->image_path) }}', '{{ addslashes($gallery->title) }}')">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-auto">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition duration-300 flex items-end">
                    <div class="p-4 w-full opacity-0 group-hover:opacity-100 transition duration-300">
                        <h3 class="text-white font-bold text-lg">{{ $gallery->title }}</h3>
                        @if($gallery->description)
                            <p class="text-gray-200 text-sm mt-1 line-clamp-2">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-gray-500">
                Belum ada galeri yang diunggah.
            </div>
            @endforelse

            <!-- Lightbox Modal -->
            <div x-show="lightboxOpen" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-sm" x-cloak
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                
                <button @click="closeLightbox()" class="absolute top-6 right-6 text-white hover:text-pupr-yellow focus:outline-none transition-colors z-[101]">
                    <i class="fa-solid fa-xmark text-4xl"></i>
                </button>

                <div class="relative w-full h-full flex flex-col items-center justify-center p-4">
                    <div x-data="{ zoomed: false }" class="relative w-full h-full flex items-center justify-center overflow-auto" @click.self="closeLightbox()">
                        <img :src="lightboxImage" :alt="lightboxTitle" 
                             @click="zoomed = !zoomed"
                             :class="zoomed ? 'scale-[1.5] md:scale-[2] cursor-zoom-out origin-center' : 'max-h-[85vh] object-contain cursor-zoom-in'"
                             class="transition-transform duration-300 ease-in-out max-w-full rounded shadow-2xl">
                    </div>

                    <div class="absolute bottom-8 left-0 right-0 text-center pointer-events-none">
                        <h3 class="text-white font-bold text-2xl drop-shadow-lg" x-text="lightboxTitle"></h3>
                        <p class="text-gray-300 text-sm mt-2 drop-shadow-md bg-black/50 inline-block px-4 py-1 rounded-full"><i class="fa-solid fa-magnifying-glass-plus mr-2"></i>Klik gambar untuk zoom in/out</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
