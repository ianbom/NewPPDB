<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::all();
        $siswa = User::all();
        return view('ppdb.admin.siswa.index_siswa', ['siswa' => $siswa, 'status'=>$status]);
    }

    public function bulkUpdateStatus(Request $request)
{
    try {
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:users,id',
            'status_id' => 'required|exists:status,id',
        ]);

        User::whereIn('id', $request->selected_ids)->update(['status_id' => $request->status_id]);

        return redirect()->back()->with('success', 'Status siswa berhasil diperbarui');
    } catch (\Throwable $th) {
        return response()->json(['err' => $th->getMessage()]);
    }
}


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }


    public function show(User $siswa)
    {   $pertanyaan = Pertanyaan::all();
        $status = Status::all();
        return view('ppdb.admin.siswa.show_siswa', ['siswa' => $siswa, 'pertanyaan' => $pertanyaan, 'status' => $status]);
    }

    public function update(Request $request, User $siswa)
    {
        $siswa->status_id = $request->status_id;
        $siswa->save();
        return redirect()->back()->with('success', 'Sukses mengubah status siswa');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
