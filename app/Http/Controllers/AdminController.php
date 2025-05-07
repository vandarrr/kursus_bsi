<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pemberitahuan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    function index()
    {

        $berita = Berita::first();

        $countAdmin = User::where('role', 'admin')->count();
        $countPengguna = User::where('role', 'user')->count();

        return view('admin.index', ['countAdmin' => $countAdmin, 'countPengguna' => $countPengguna, 'berita' => $berita]);
    }

    function controlCybersecurity()
    {
        $dataCybersecurity = Kursus::where('kursus', 'cybersecurity')->get();
        return view('admin.cybersecurity', ['datacybersecurity' => $dataCybersecurity]);
    }
    function controlUiux()
    {
        $dataUiux = Kursus::where('kursus', 'uiux')->get();
        return view('admin.uiux', ['datauiux' => $dataUiux]);
    }
    function controlUser()
    {
        $dataPengguna = User::where('role', 'user')->get();

        return view('admin.users', ['dataPengguna' => $dataPengguna]);
    }
    function jadwalCybersecurity()
    {
        $jadwalCybersecurity = Jadwal::where('kursus', 'cybersecurity')->get();
        return view('admin.jadwal_cybersecurity', ['jadwalcybersecurity' => $jadwalCybersecurity]);
    }
    function jadwalUiux()
    {
        $jadwalUiux = Jadwal::where('kursus', 'uiux')->get();
        return view('admin.jadwal_uiux', ['jadwaluiux' => $jadwalUiux]);
    }

    public function updateBerita(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        $berita = Berita::first();
        $berita->konten = $request->input('konten');
        $berita->save();

        return redirect()->route('admin')->with('success', 'Berita berhasil diperbarui.');
    }

    public function approve($id)
    {
        $cybersecurity = Kursus::find($id);

        if ($cybersecurity) {
            $cybersecurity->status = 'Disetujui';
            $cybersecurity->save();
        }

        $currentWaktu = Carbon::now()->format('F j, Y');

        Pemberitahuan::create([
            'email' => $cybersecurity->email,
            'waktu' => $currentWaktu,
            'pesan' => "Selamat! Admin telah Menyetujui anda untuk mengikuti kursus $cybersecurity->kursus! Periksa Jadwal anda saat ini. See You!",
            'type' => "info"
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil disetujui.');
    }

    public function reject($id)
    {
        $cybersecurity = Kursus::find($id);

        if ($cybersecurity) {
            $cybersecurity->status = 'ditolak';
            $cybersecurity->save();
        }

        $currentWaktu = Carbon::now()->format('F j, Y');

        Pemberitahuan::create([
            'email' => $cybersecurity->email,
            'waktu' => $currentWaktu,
            'pesan' => "Jangan Patah Semangat! Admin telah Menolak anda untuk mengikuti kursus $cybersecurity->kursus! GoodBye!",
            'type' => "info"
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function storeJadwal(Request $request)
    {
        // Validasi data
        $request->validate([
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_start' => 'required|date_format:H:i',
            'waktu_end' => 'required|date_format:H:i',
            'tempat' => 'required|string|max:255',
            'instruktur' => 'required|string|max:255',
            'kursus' => 'required|string|in:cybersecurity,uiux',
        ]);

        // Buat jadwal baru
        Jadwal::create([
            'hari' => $request->input('hari'),
            'tanggal' => $request->input('tanggal'),
            'waktu' => $request->input('waktu_start') . ' - ' . $request->input('waktu_end'),
            'tempat' => $request->input('tempat'),
            'instruktur' => $request->input('instruktur'),
            'kursus' => $request->input('kursus'),
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        list($waktu_start, $waktu_end) = explode(' - ', $jadwal->waktu);

        return response()->json([
            'hari' => $jadwal->hari,
            'tanggal' => $jadwal->tanggal,
            'waktu_start' => $waktu_start,
            'waktu_end' => $waktu_end,
            'tempat' => $jadwal->tempat,
            'instruktur' => $jadwal->instruktur,
        ]);
    }

    public function updatejadwal(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_start' => 'required|date_format:H:i',
            'waktu_end' => 'required|date_format:H:i',
            'tempat' => 'required|string|max:255',
            'instruktur' => 'required|string|max:255',
            'kursus' => 'required|string|in:cybersecurity,uiux',
        ]);

        // Temukan jadwal dan update
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->hari = $request->input('hari');
        $jadwal->tanggal = $request->input('tanggal');
        $jadwal->waktu = $request->input('waktu_start') . ' - ' . $request->input('waktu_end');
        $jadwal->tempat = $request->input('tempat');
        $jadwal->instruktur = $request->input('instruktur');
        $jadwal->kursus = $request->input('kursus');
        $jadwal->save();

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroyJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
    function laporanAdmin()
    {
        $data = Kursus::all();

        return view('admin.laporan', ['data' => $data]);
    }
    function generateLaporanAdminPdf()
    {
        $data = Kursus::all();

        $timestamp = now()->format('Ymd_His');
        $filename = 'laporan_pengajuan_' . $timestamp . '.pdf';

        $pdf = PDF::loadView('admin.laporan_pdf', ['data' => $data]);

        return $pdf->download($filename);
    }
}
