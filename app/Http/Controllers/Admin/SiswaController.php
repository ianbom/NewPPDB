<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::all();
        $siswa = User::where('is_admin', false)->get();
        return view('ppdb.admin.siswa.index_siswa', ['siswa' => $siswa, 'status'=>$status]);
    }

    public function bulkUpdateStatus(Request $request)
    {
        try {
            $request->validate([
                'selected_ids' => 'required|array',
                'selected_ids.*' => 'exists:users,id',
                'status_id' => 'required|string', // Changed to string to accept 'delete'
            ]);

            if ($request->status_id === 'delete') {
                // Handle bulk delete
                User::whereIn('id', $request->selected_ids)->delete();
                return redirect()->back()->with('success', 'Siswa yang dipilih berhasil dihapus');
            }

            // Validate status_id only for update operation
            if (!in_array($request->status_id, ['delete'])) {
                $request->validate([
                    'status_id' => 'exists:status,id',
                ]);

                // Handle status update
                User::whereIn('id', $request->selected_ids)->update(['status_id' => $request->status_id]);
                return redirect()->back()->with('success', 'Status siswa berhasil diperbarui');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

public function editPasswordSiswa( User $siswa){

    return view('ppdb.admin.siswa.edit_password_siswa', ['siswa' => $siswa]);
}

    public function updatePasswordSiswa(Request $request, User $siswa){

        $request->validate([
            'password' => 'string',
        ]);

        $siswa->password = Hash::make($request->password);
        $siswa->save();
        return redirect()->route('siswa.show', $siswa->id)->with('success', 'Password berhasil diubah');
    }

    public function generatePdf(Request $request){

        $siswa = User::where('status_id', $request->status_id)->get();
        $pdf = PDF::loadView('ppdb.admin.siswa.pdf_siswa', ['siswa' => $siswa]);
        return $pdf->download('hasil-selesi.pdf');
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

    public function bulkDelete(Request $request)
{
    try {
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:users,id',
            'status_id' => 'required|exists:status,id',
        ]);


        if (!$request->selected_ids) {
            return redirect()->back()->with('error', 'Tidak ada siswa yang dipilih.');
        } else{

        User::whereIn('id', $request->selected_ids)->delete();
        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
        }
    } catch (\Throwable $th) {
       return response()->json(['error' => $th->getMessage()]);
    }

}

    public function destroy(User $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
