<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnggotaRequest;
use App\Mail\PendaftaranNotification;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('public.pendaftaran.form', [
            'route' => route('public.pendaftaran.store'),
        ]);
    }

    public function store(AnggotaRequest $request)
    {
        $data = $request->validated();

        // Handle file upload bukti_file
        if ($request->hasFile('bukti_file')) {
            $data['bukti_file'] = $request->file('bukti_file')->store('uploads/bukti', 'public');
        }

        $pendaftaran = Pendaftaran::create($data);

        return redirect()->route('public.pendaftaran.success')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function success()
    {
        return view('public.pendaftaran.success');
    }
}

