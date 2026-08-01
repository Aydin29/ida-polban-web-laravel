<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LowonganRequest;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::latest()->paginate(15);

        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        return view('admin.lowongan.form', [
            'lowongan' => new Lowongan(),
            'method' => 'POST',
            'route' => route('admin.lowongan.store'),
            'title' => 'Tambah Lowongan',
        ]);
    }

    public function store(LowonganRequest $request)
    {
        Lowongan::create($request->validated());

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.lowongan.edit', $id);
    }

    public function edit(string $id)
    {
        return view('admin.lowongan.form', [
            'lowongan' => Lowongan::findOrFail($id),
            'method' => 'PUT',
            'route' => route('admin.lowongan.update', $id),
            'title' => 'Edit Lowongan',
        ]);
    }

    public function update(LowonganRequest $request, string $id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update($request->validated());

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Lowongan::findOrFail($id)->delete();

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
