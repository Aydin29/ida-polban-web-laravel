<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StrukturRequest;
use App\Models\Struktur;

class StrukturController extends Controller
{
    public function index()
    {
        $strukturs = Struktur::orderBy('urutan')->paginate(15);

        return view('admin.struktur.index', compact('strukturs'));
    }

    public function create()
    {
        return view('admin.struktur.form', [
            'struktur' => new Struktur(),
            'method' => 'POST',
            'route' => route('admin.struktur.store'),
            'title' => 'Tambah Struktur',
        ]);
    }

    public function store(StrukturRequest $request)
    {
        Struktur::create($request->validated());

        return redirect()->route('admin.struktur.index')->with('success', 'Struktur berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.struktur.edit', $id);
    }

    public function edit(string $id)
    {
        return view('admin.struktur.form', [
            'struktur' => Struktur::findOrFail($id),
            'method' => 'PUT',
            'route' => route('admin.struktur.update', $id),
            'title' => 'Edit Struktur',
        ]);
    }

    public function update(StrukturRequest $request, string $id)
    {
        $struktur = Struktur::findOrFail($id);
        $struktur->update($request->validated());

        return redirect()->route('admin.struktur.index')->with('success', 'Struktur berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Struktur::findOrFail($id)->delete();

        return redirect()->route('admin.struktur.index')->with('success', 'Struktur berhasil dihapus.');
    }
}
