@extends('layouts.app')

@section('title', 'Proyek Infrastruktur - Dinas PUPR Kabupaten Bombana')

@section('content')
<div class="bg-pupr-blue py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">Proyek Infrastruktur</h1>
        <p class="mt-3 text-xl text-gray-200">Transparansi perkembangan dan data proyek infrastruktur di Bombana.</p>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border-t-4 border-pupr-blue">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">{{ $project->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $project->location }}
                    </p>
                </div>
                <div class="p-6 bg-gray-50">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-500">Nilai Proyek:</span>
                        <span class="font-bold text-gray-900">Rp {{ number_format($project->value, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Status:</span>
                        @if(strtolower($project->status) == 'selesai')
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Selesai</span>
                        @else
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">{{ ucfirst($project->status) }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 text-gray-500">
                Belum ada data proyek saat ini.
            </div>
            @endforelse
        </div>
        
        <div class="mt-12">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
