<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PertanyaanRequest;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('ppdb.admin.pertanyaan.index_pertanyaan', ['pertanyaan' => $pertanyaan]);
    }

    public function create()
    {
        return view('ppdb.admin.pertanyaan.create_pertanyaan');
    }

    public function store(PertanyaanRequest $request)
    {
        $data = $request->all();
        Pertanyaan::create($data);
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(Pertanyaan $pertanyaan)
    {
        return view('ppdb.admin.pertanyaan.edit_pertanyaan', ['pertanyaan' => $pertanyaan]);
    }


    public function update(PertanyaanRequest $request, Pertanyaan $pertanyaan)
    {
        $data = $request->all();
        $pertanyaan->update($data);
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
