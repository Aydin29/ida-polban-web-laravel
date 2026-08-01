<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaGroup;
use Illuminate\Http\Request;

class WaGroupController extends Controller
{
    public function index()
    {
        $waGroups = WaGroup::orderBy('angkatan', 'desc')->get();
        return view('admin.wa-group.index', compact('waGroups'));
    }

    public function create()
    {
        return view('admin.wa-group.form', [
            'waGroup' => new WaGroup(),
            'method' => 'POST',
            'route' => route('admin.wa-group.store'),
            'title' => 'Tambah Link Grup WA',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'angkatan' => 'required|string|max:10|unique:wa_groups,angkatan',
            'link_group' => 'required|string|max:255',
            'nama_group' => 'nullable|string|max:255',
        ]);

        WaGroup::create($request->all());

        return redirect()->route('admin.wa-group.index')->with('success', 'Link grup WA berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        return view('admin.wa-group.form', [
            'waGroup' => WaGroup::findOrFail($id),
            'method' => 'PUT',
            'route' => route('admin.wa-group.update', $id),
            'title' => 'Edit Link Grup WA',
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'angkatan' => 'required|string|max:10|unique:wa_groups,angkatan,' . $id,
            'link_group' => 'required|string|max:255',
            'nama_group' => 'nullable|string|max:255',
        ]);

        $waGroup = WaGroup::findOrFail($id);
        $waGroup->update($request->all());

        return redirect()->route('admin.wa-group.index')->with('success', 'Link grup WA berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        WaGroup::findOrFail($id)->delete();

        return redirect()->route('admin.wa-group.index')->with('success', 'Link grup WA berhasil dihapus.');
    }
}
