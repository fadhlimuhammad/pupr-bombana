<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\HeroCarousel;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Pejabat;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Proyek', Project::count())
                ->description('Total proyek terdata')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary'),
                
            Stat::make('Aduan Masuk', Complaint::count())
                ->description('Laporan masyarakat')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('danger'),
                
            Stat::make('Berita & Pengumuman', Post::count())
                ->description('Total publikasi')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
                
            Stat::make('Hero Carousel Aktif', HeroCarousel::where('is_active', true)->count())
                ->description('Slide tayang di depan')
                ->descriptionIcon('heroicon-m-photo')
                ->color('warning'),
                
            Stat::make('Dokumen Publik', Document::count())
                ->description('File yang diunggah')
                ->descriptionIcon('heroicon-m-folder-open')
                ->color('info'),
                
            Stat::make('Galeri Foto', Gallery::count())
                ->description('Foto kegiatan')
                ->descriptionIcon('heroicon-m-camera')
                ->color('primary'),
                
            Stat::make('Struktur Organisasi', Pejabat::count())
                ->description('Pejabat terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray'),
        ];
    }
}
