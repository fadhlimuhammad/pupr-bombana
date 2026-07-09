<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Project;
use App\Models\Document;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Dummy Posts for Program Kegiatan
        for ($i = 1; $i <= 5; $i++) {
            Post::create([
                'title' => 'Program Unggulan PUPR ' . $i,
                'slug' => Str::slug('Program Unggulan PUPR ' . $i),
                'content' => '<p>Ini adalah detail dari program unggulan PUPR ke-' . $i . ' yang berfokus pada pembangunan infrastruktur dan kesejahteraan masyarakat. Program ini diharapkan dapat meningkatkan aksesibilitas dan perekonomian daerah secara merata.</p><p>Berbagai langkah strategis telah disusun mulai dari tahap perencanaan, pelaksanaan, hingga pengawasan agar program berjalan sesuai dengan target waktu dan mutu yang telah ditetapkan.</p>',
                'image' => null,
                'is_headline' => false,
                'is_highlight' => ($i <= 2),
                'category' => 'program',
                'published_at' => now()->subDays($i),
            ]);
        }

        // Dummy Projects for Proyek Pembangunan
        $projectStatuses = ['pending', 'berjalan', 'selesai'];
        for ($i = 1; $i <= 6; $i++) {
            Project::create([
                'name' => 'Proyek Pembangunan Infrastruktur ' . $i,
                'description' => 'Proyek ini bertujuan untuk memperbaiki fasilitas umum dan akses jalan di wilayah Kabupaten Bombana. Diharapkan dengan selesainya proyek ini, mobilitas masyarakat dan kelancaran distribusi logistik akan semakin meningkat.',
                'status' => $projectStatuses[array_rand($projectStatuses)],
                'location' => 'Kecamatan ' . ['Rumbia', 'Poleang', 'Kabaena', 'Rarowatu'][array_rand(['Rumbia', 'Poleang', 'Kabaena', 'Rarowatu'])],
                'value' => rand(100, 1000) * 1000000, // Random millions
                'photo_before' => null,
                'photo_after' => null,
            ]);
        }

        // Dummy Documents for Dokumen & Transparansi
        $docCategories = ['Keuangan', 'Laporan Kinerja', 'Regulasi', 'SOP'];
        for ($i = 1; $i <= 8; $i++) {
            Document::create([
                'title' => 'Dokumen Transparansi Publik ' . $i . ' Tahun ' . (2024 - rand(0, 2)),
                'description' => 'Dokumen resmi yang berisi rincian laporan dan transparansi pelaksanaan kegiatan pada Dinas PUPR Kabupaten Bombana.',
                'file_path' => 'dummy/document' . $i . '.pdf',
                'category' => $docCategories[array_rand($docCategories)],
                'type' => 'PDF',
            ]);
        }
    }
}
