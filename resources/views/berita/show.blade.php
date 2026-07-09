@extends('layouts.app')

@section('title', $post->title . ' - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('berita.index') }}" class="text-pupr-blue hover:underline mb-8 inline-block">&larr; Kembali ke Berita</a>
        
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-500 mb-8">{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}</p>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full rounded-lg shadow-md mb-8">
        @endif

        <div class="prose prose-lg prose-blue max-w-none text-gray-800">
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection
