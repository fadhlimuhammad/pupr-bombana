<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Complaint;
use App\Models\Project;
use App\Models\Document;
use App\Models\Setting;
use App\Models\Pejabat;
use App\Models\HeroCarousel;

class FrontendController extends Controller
{
    public function index()
    {
        $heroCarousels = HeroCarousel::where('is_active', true)->orderBy('order')->get();
        $headlines = Post::where('is_headline', true)->latest('published_at')->take(3)->get();
        // Berita terbaru
        $latestNews = Post::whereIn('category', ['berita', 'press_release'])->latest('published_at')->take(4)->get();
        // Program Unggulan
        $highlightPrograms = Post::where('is_highlight', true)->latest('published_at')->take(3)->get();
        
        // Settings
        $settings = Setting::pluck('value', 'key');
        
        $stats = [
            'proyek_selesai' => Project::where('status', 'selesai')->count(),
            'proyek_berjalan' => Project::where('status', 'berjalan')->count(),
            'program_aktif' => Post::whereIn('category', ['program', 'kegiatan'])->count(),
            'pengaduan_masuk' => Complaint::count(),
        ];

        return view('home', compact('heroCarousels', 'headlines', 'latestNews', 'highlightPrograms', 'settings', 'stats'));
    }

    public function profil()
    {
        $settings = Setting::pluck('value', 'key');
        $pejabats = Pejabat::orderBy('urutan')->get()->groupBy('level');
        
        return view('profil', compact('settings', 'pejabats'));
    }

    public function berita(Request $request)
    {
        $query = Post::whereIn('category', ['berita', 'pengumuman', 'press_release']);
        
        if ($request->filled('divisi')) {
            $query->where('divisi', $request->divisi);
        }
        
        $posts = $query->latest('published_at')->paginate(9);
        return view('berita.index', compact('posts'));
    }

    public function beritaDetail($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('category', $post->category)->where('id', '!=', $post->id)->latest('published_at')->take(3)->get();
        return view('berita.show', compact('post', 'relatedPosts'));
    }

    public function program()
    {
        $posts = Post::whereIn('category', ['program', 'kegiatan', 'agenda'])->latest('published_at')->paginate(9);
        return view('program.index', compact('posts'));
    }

    public function proyek()
    {
        $projects = Project::latest()->paginate(9);
        return view('proyek.index', compact('projects'));
    }

    public function galeri()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('galeri', compact('galleries'));
    }

    public function dokumen()
    {
        $documents = Document::latest()->paginate(15);
        return view('dokumen.index', compact('documents'));
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function aduan()
    {
        return view('aduan');
    }

    public function storeAduan(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_phone' => 'required|string|max:20',
            'sender_email' => 'nullable|email|max:255',
            'report_date' => 'required|date',
            'street' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'complaint_type' => 'required|string|max:255',
            'content' => 'required|string',
            'expectation' => 'nullable|string',
            'photo' => 'nullable|image|max:5120',
            'video' => 'nullable|mimes:mp4,mov,avi,qt|max:20480',
            'document' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        $validated['location'] = $validated['street'] . ', Kec. ' . $validated['district'] . ', ' . $validated['city'];

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('complaints/photos', 'public');
        }
        if ($request->hasFile('video')) {
            $validated['video_path'] = $request->file('video')->store('complaints/videos', 'public');
        }
        if ($request->hasFile('document')) {
            $validated['document_path'] = $request->file('document')->store('complaints/documents', 'public');
        }

        Complaint::create($validated);

        return redirect()->route('aduan')->with('success', 'Aduan Anda berhasil dikirim dan akan segera diproses.');
    }
}
