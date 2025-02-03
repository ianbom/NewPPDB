<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        $status = Status::all();
        return view('ppdb.admin.status.index_status', ['status' => $status]);
    }

    public function create(){
        return view('ppdb.admin.status.create_status');
    }

    public function store(StatusRequest $request){
        $data = $request->all();
        Status::create($data);
        return redirect()->route('status.index')->with('success', 'Status berhasil ditambahkan');
    }

    public function edit(Status $status){
        return view('ppdb.admin.status.edit_status', ['status' => $status]);
    }

    public function update(StatusRequest $request, Status $status){
        $status->update($request->all());
        return redirect()->route('status.index')->with('success', 'Status berhasil diupdate');
    }

    public function destroy(Status $status){
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Status berhasil dihapus');
    }
}
