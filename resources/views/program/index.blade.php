@extends('layouts.app')

@section('title', 'Program & Kegiatan - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="bg-pupr-blue py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Program & Kegiatan</h1>
        <p class="mt-3 text-xl text-gray-200">Informasi program dan kegiatan pembangunan yang dijalankan.</p>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img class="h-48 w-full object-cover" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://placehold.co/600x400/0b3b60/ffffff?text=Program+PUPR' }}" alt="{{ $post->title }}">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold px-2 py-1 bg-pupr-yellow/20 text-pupr-yellow-dark rounded uppercase tracking-wide">{{ $post->category }}</span>
                        <span class="text-sm text-gray-500">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                    </div>
                    <a href="{{ route('berita.show', $post->slug) }}" class="block mt-2">
                        <h3 class="text-xl font-bold text-gray-900 hover:text-pupr-blue transition-colors">{{ $post->title }}</h3>
                        <p class="mt-3 text-base text-gray-500">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 text-gray-500">
                Belum ada data program/kegiatan saat ini.
            </div>
            @endforelse
        </div>
        
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
