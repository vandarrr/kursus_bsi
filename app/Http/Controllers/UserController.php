<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Berita;
use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pemberitahuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index()
    {

        $email = Auth::user()->email;

        $thisKursus = Kursus::where('email',$email)->get();

        $kursus = $thisKursus->pluck('kursus')->implode(',');

        $totalDisetujui = $thisKursus->where('status','Disetujui')->count();

        $pemberitahuan = Pemberitahuan::where('email',$email)->get();

        $totalPemberitahuan = $pemberitahuan->count();

        $berita = Berita::first();

        return view('user.index',[
            'kursus' => $kursus, 
            'totalDisetujui' => $totalDisetujui, 
            'pemberitahuan' => $pemberitahuan, 
            'TotalPemberitahuan' => $totalPemberitahuan, 
            'berita' => $berita
        ]);
    }

    public function cybersecurity(){
        $email = Auth::user()->email;
        $isRegistered = Kursus::where('email',$email)->where('kursus','cybersecurity')->exists();

        $pemberitahuan = Pemberitahuan::where('email',$email)->get();

        $totalPemberitahuan = $pemberitahuan->count();

        return view('user.cybersecurity',['isRegistered' => $isRegistered, 'pemberitahuan' => $pemberitahuan, 'totalPemberitahuan' => $totalPemberitahuan]);
    }

    public function uiux(){
        $email = Auth::user()->email;
        $isRegistered = Kursus::where('email',$email)->where('kursus','uiux')->exists();

        $pemberitahuan = Pemberitahuan::where('email',$email)->get();

        $totalPemberitahuan = $pemberitahuan->count();

        return view('user.uiux',['isRegistered' => $isRegistered, 'pemberitahuan' => $pemberitahuan, 'totalPemberitahuan' => $totalPemberitahuan]);
    }

    public function jadwal()
    {
        $kursusList = Kursus::where('email', Auth::user()->email)->get();

        $isJadwal = collect();

        $statusMessages = $kursusList->map(function ($kursus) {
            return [
                'kursus' => $kursus->kursus,
                'status' => $kursus->status,
            ];
        });

        if ($kursusList->isNotEmpty()) {
            foreach ($kursusList as $kursus) {
                if ($kursus->status === 'Disetujui') {
                    $isJadwal = $isJadwal->merge(Jadwal::where('kursus', $kursus->kursus)->get());
                }
            }
        }

        $notification = Pemberitahuan::where('email',Auth::user()->email)->get();
        $countNotifications = $notification->count();

        return view('user.jadwal', [
            'isJadwal' => $isJadwal,
            'statusMessages' => $statusMessages,
            'notification' => $notification,
            'countNotifications' => $countNotifications
        ]);
    }
    public function laporan()
    {
        $kursusList = Kursus::where('email', Auth::user()->email)->get();

        $isJadwal = collect();
        $approvedKursusList = collect();

        if ($kursusList->isNotEmpty()) {
            foreach ($kursusList as $kursus) {
                if ($kursus->status === 'Disetujui') {
                    $isJadwal = $isJadwal->merge(Jadwal::where('kursus', $kursus->kursus)->get());
                    $approvedKursusList->push($kursus);
                }
            }
        }

        $laporan = $approvedKursusList->map(function ($kursus) {
            return (object)[
                'name' => $kursus->name,
                'email' => $kursus->email,
                'phone' => $kursus->phone,
                'kursus' => $kursus->kursus,
                'start' => $kursus->created_at->format('Y/m/d')
            ];
        });

        $notification = Pemberitahuan::where('email',Auth::user()->email)->get();
        $countNotifications = $notification->count();

        return view('user.laporan', [
            'isJadwal' => $isJadwal,
            'laporan' => $laporan,
            'notification' => $notification,
            'countNotifications' => $countNotifications
        ]);
    }
    function generateLaporanPdf() {
        $user = Auth::user();
        $kursusList = Kursus::where('email', Auth::user()->email)->get();
        $isJadwal = collect();
    
        if ($kursusList->isNotEmpty()) {
            foreach ($kursusList as $kursus) {
                if ($kursus->status === 'Disetujui') {
                    $isJadwal = $isJadwal->merge(Jadwal::where('kursus', $kursus->kursus)->get());
                }
            }
        }
    
        $laporan = $kursusList->map(function ($kursus) {
            return [
                'name' => $kursus->name,
                'email' => $kursus->email,
                'phone' => $kursus->phone,
                'kursus' => $kursus->kursus,
                'start' => $kursus->created_at,
            ];
        });

        $idKursus = 'KRS-' . strtoupper(substr($user->name, 0, 3)) . '-' . $user->id;
        $noPelajar = 'NP-' . strtoupper(substr($user->name, 0, 3)) . '-' . date('Ymd', strtotime($user->created_at));

        $timestamp = now()->format('Ymd_His');
        $filename = 'laporan_kursus_' . $user->id . '_' . $timestamp . '.pdf';
    
        $pdf = PDF::loadView('user.laporan_pdf', [
            'idKursus' => $idKursus,
            'noPelajar' => $noPelajar,
            'isJadwal' => $isJadwal,
            'laporan' => $laporan,
            'user' => $user
        ]);
    
        return $pdf->download($filename);
    }

    function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required',
            'alamat' => 'required|string',
            'alasan' => 'required|string',
            'kursus' => 'required',
            'cv' => 'required|mimes:pdf|max:1024'
        ],[
            'name.required' => 'name wajib diisi!',
            'email.required' => 'email wajib diisi!',
            'phone.required' => 'nohp wajib diisi!',
            'alamat.required' => 'alamat wajib diisi!',
            'alasan.required' => 'alasan wajib diisi!',
            'kursus.required' => 'kursus wajib diisi!',
            'cv.required' => 'cv wajib diisi',
            'cv.mimes' => 'cv harus berupa file pdf',
            'cv.max' => 'cv tidak boleh lebih dari 1mb'
        ]);

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '_' . uniqid() . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('documents'), $cvName);
        }

         // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');


        $orderId = 'ORDER-' . time() . '-' . uniqid();

        // Data transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => 100000, // Ganti dengan jumlah yang sesuai
            ],
            'customer_details' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
            'payment_type' => 'bank_transfer',
            'bank_transfer' => [
                'bank' => 'bca'
            ],
        ];

        

        // Mendapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);
        if (!$snapToken) {
            Log::error('Gagal mendapatkan snap token dari Midtrans.',);
            return back()->with('error', 'Gagal membuat transaksi, silakan coba lagi.');
        }

        $kursus = Kursus::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'alasan' => $request->alasan,
            'kursus' => $request->kursus,
            'cv' => $cvName,
            'status' => 'Menunggu Pembayaran',
            'snap_token' => $snapToken,
            'order_id' => $orderId,
            'payment_status' => 'Menunggu Pembayaran',
        ]);

        $currentWaktu = Carbon::now()->format('F j, Y');

        Pemberitahuan::create([
            'email' => $request->email,
            'waktu' => $currentWaktu,
            'pesan' => "Berhasil Mendaftar Kursus $request->kursus! Mohon tunggu persentujuan dari Admin. Terimakasih",
        ]);

        return redirect()->route('payment.page', ['id' => $kursus->id]);
        
    }
    function ubahProfile(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1048'
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->hasFile('image')) {
            if ($user->image && !$user->google_id) {
                $oldImagePath = public_path('images/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            if($user->google_id){
                $filename = 'images/' . time() . '.' . $request->image->extension();
            }else{
                $filename = time() . '.' . $request->image->extension();
            }

            $request->image->move(public_path('images'), $filename);
            $user->image = $filename;
        }
        
        $user->save();


        if($user->role !== 'admin') {
            return redirect()->route('user')->with('success', 'Profile updated successfully.');
        }

        return redirect()->route('admin')->with('success', 'Profile updated successfully.');
    }

    public function paymentPage($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('payment', ['snapToken' => $kursus->snap_token]);
    }

    public function midtransCallback(Request $request)
{
    $payload = $request->all();
    Log::info('Callback Diterima:', $payload);

    // Lanjutkan verifikasi signature_key jika perlu

    // Update status pembayaran ke database
    // Misal berdasarkan order_id
}

}
