<?php

namespace App\Http\Controllers;

use App\Http\Requests\JawabanRequest;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemberkasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        $jawaban = Jawaban::where('user_id', auth()->id())->get()->keyBy('pertanyaan_id');
        return view('ppdb.user.pemberkasan.index_pemberkasan', ['pertanyaan' => $pertanyaan, 'jawaban' => $jawaban]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JawabanRequest $request)
    {
        try {
            $userId = Auth::id();
            $data = $request->all();
            $data['user_id'] = $userId;
            if ($request->hasFile('jawaban')) {
                $filePath = $request->file('jawaban')->store('siswa/berkas', 'public');
                $data['jawaban'] = $filePath;
            }

            Jawaban::create($data);
            return redirect()->route('pemberkasan.index')->with('success', 'Berkas telah dibuat');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }


    public function show(Pertanyaan $pemberkasan)
    {

        return view('ppdb.user.pemberkasan.create_pemberkasan', ['pemberkasan' => $pemberkasan]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
