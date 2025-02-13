<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $totalUser = User::where('is_admin', false)->count();
        $userDitolak = User::where('is_admin', false)->where('status_id', 4)->count();
        $userDiterima = User::where('is_admin', false)->where('status_id', 3)->count();
        $userProses = User::where('is_admin', false)->where(function($query) {
        $query->whereIn('status_id', [1, 2])
              ->orWhereNull('status_id');
    })
    ->count();

        $userTerbaru = User::where('is_admin', false)->orderBy('created_at', 'desc')->take(10)->get();

        // return response()->json(['totalUser' => $totalUser, 'userDitolak' => $userDitolak, 'userDiterima' => $userDiterima, 'userProses' => $userProses]);
         return view('ppdb.admin.pertanyaan.dashboard', ['totalUser' => $totalUser, 'userDitolak' => $userDitolak, 'userDiterima' => $userDiterima, 'userProses' => $userProses, 'userTerbaru' => $userTerbaru]);
    }

    public function profile(){
        $profile = Auth::user();
        $pertanyaan = Pertanyaan::all();
        return view('ppdb.admin.profile.profile_admin', ['profile' => $profile, 'pertanyaan' => $pertanyaan]);
    }
}
