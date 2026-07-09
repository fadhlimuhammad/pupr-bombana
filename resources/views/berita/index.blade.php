@extends('layouts.app')

@section('title', 'Berita - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="bg-pupr-blue py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Berita & Informasi</h1>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
                <div class="p-6">
                    <p class="text-xs text-pupr-blue font-semibold mb-2">{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}</p>
                    <a href="{{ route('berita.show', $post->slug) }}" class="block text-lg font-bold text-gray-900 hover:text-pupr-blue mb-3 line-clamp-2">{{ $post->title }}</a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-gray-500">
                Belum ada berita yang diterbitkan.
            </div>
            @endforelse
        </div>
        
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
