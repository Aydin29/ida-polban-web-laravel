<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use App\Models\GaleriImage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::withCount('images')->latest()->paginate(15);

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.form', [
            'galeri' => new Galeri(),
            'method' => 'POST',
            'route' => route('admin.galeri.store'),
            'title' => 'Tambah Galeri',
        ]);
    }

    public function store(GaleriRequest $request)
    {
        $validated = $request->validated();

        $galeri = Galeri::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'kategori' => $validated['kategori'] ?? null,
            'periode' => $validated['periode'] ?? null,
        ]);

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('', 'galeri');
                $galeri->images()->create(['gambar' => $path]);
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.galeri.edit', $id);
    }

    public function edit(string $id)
    {
        return view('admin.galeri.form', [
            'galeri' => Galeri::with('images')->findOrFail($id),
            'method' => 'PUT',
            'route' => route('admin.galeri.update', $id),
            'title' => 'Edit Galeri',
        ]);
    }

    public function update(GaleriRequest $request, string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $validated = $request->validated();

        $galeri->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'kategori' => $validated['kategori'] ?? null,
            'periode' => $validated['periode'] ?? null,
        ]);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('', 'galeri');
                $galeri->images()->create(['gambar' => $path]);
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $galeri = Galeri::with('images')->findOrFail($id);

        // Delete all associated images from storage
        foreach ($galeri->images as $image) {
            $image->deleteStoredImage();
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function deleteImage(string $id)
    {
        $image = GaleriImage::findOrFail($id);
        $image->deleteStoredImage();
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
