<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PendaftaranNotification;
use App\Models\Anggota;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::latest()->paginate(15);

        $totalCount = Pendaftaran::count();
        $pendingCount = Pendaftaran::whereIn('status', ['pending', 'baru'])->count();
        $approvedCount = Pendaftaran::where('status', 'approved')->count();
        $rejectedCount = Pendaftaran::where('status', 'rejected')->count();

        return view('admin.pendaftaran.index', compact(
            'pendaftarans',
            'totalCount',
            'pendingCount',
            'approvedCount',
            'rejectedCount'
        ));
    }

    public function show(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    public function approve(Request $request, string $id)
    {
        $request->validate([
            'periode' => 'required|string|max:50',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $emailSent = false;
        $emailError = null;

        // Update status pendaftaran + periode
        $pendaftaran->update([
            'status' => 'approved',
            'periode' => $request->periode,
            'approved_at' => now(),
            'rejected_at' => null,
        ]);

        // Buat data anggota baru dari pendaftar yang disetujui
        Anggota::create([
            'nama_lengkap'   => $pendaftaran->nama_lengkap,
            'nama_panggilan' => $pendaftaran->nama_panggilan,
            'nomor_hp'       => $pendaftaran->nomor_hp,
            'asal_sekolah'   => $pendaftaran->asal_sekolah,
            'jurusan'        => $pendaftaran->jurusan,
            'program_studi'  => $pendaftaran->program_studi,
            'angkatan'       => $pendaftaran->angkatan,
            'alamat_rumah'   => $pendaftaran->alamat_rumah,
            'periode'        => $request->periode,
        ]);

        $message = '✅ Pendaftar diterima dan data anggota berhasil ditambahkan!';

        // Hanya kirim email balasan ke pendaftar saat status disetujui
        if (!empty($pendaftaran->email)) {
            try {
                Mail::to($pendaftaran->email)->send(new \App\Mail\PendaftaranDiterimaMail($pendaftaran, $request->periode));
                $emailSent = true;
            } catch (\Throwable $e) {
                $emailError = $e->getMessage();
                Log::error('Gagal kirim email balasan ke pendaftar: ' . $e->getMessage());
            }
        }

        if ($emailSent) {
            $message .= ' 📩 Email balasan juga dikirim ke pendaftar.';
        } elseif (!empty($pendaftaran->email) && $emailError) {
            $message .= ' ⚠️ Data anggota berhasil ditambahkan, tetapi email gagal dikirim.';
        }

        return redirect()->route('admin.pendaftaran.show', $pendaftaran)
            ->with('success', $message);
    }

    public function reject(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update([
            'status' => 'rejected',
            'rejected_at' => now(),
            'approved_at' => null,
        ]);

        return redirect()->route('admin.pendaftaran.show', $pendaftaran)->with('success', 'Pendaftar ditolak!');
    }

    public function destroy(string $id)
    {
        Pendaftaran::findOrFail($id)->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftar berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.pendaftaran.index')->with('error', 'Tidak ada pendaftar yang dipilih.');
        }

        $count = count($ids);
        Pendaftaran::whereIn('id', $ids)->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', "$count pendaftar berhasil dihapus.");
    }
}
