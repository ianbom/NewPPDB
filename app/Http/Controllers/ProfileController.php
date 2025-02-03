<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user();
        $pertanyaan = Pertanyaan::all();
        return view('ppdb.user.profile.index_profile', ['profile' => $profile, 'pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update2(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('profile')) {
            $imagePath = $request->file('profile')->store('image/siswa', 'public');
        } else {
            $imagePath = $user->profile;
        }

        $user->name = $request->name;
        $user->telp = $request->telp;
        $user->profile = $imagePath;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Profile telah diubah');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
