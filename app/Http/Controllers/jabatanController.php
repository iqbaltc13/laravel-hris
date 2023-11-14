<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use DB;

class JabatanController extends Controller
{
    public function index()
    {
        return view('jabatan.index', [
            'title' => 'Master Jabatan',
            'data_jabatan' => Jabatan::all()
        ]);
    }

    public function create()
    {
        return view('jabatan.create', [
            'title' => 'Tambah Data Jabatan'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jabatan' => 'required|max:255',
        ]);
        DB::beginTransaction();
        try {
            Jabatan::create($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal ditambahkan ']);
            // something went wrong
        }
        
        return redirect('/jabatan')->with('success', 'Data Berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('jabatan.edit', [
            'title' => 'Edit Data Jabatan',
            'data_jabatan' => Jabatan::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jabatan' => 'required|max:255',
        ]);
        DB::beginTransaction();
        try {
            Jabatan::where('id', $id)->update($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal ']);
            // something went wrong
        }
        
        return redirect('/jabatan')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $user = User::where('jabatan_id', $id)->count();
        if ($user > 0) {
            Alert::error('Failed', 'Masih Ada User Yang Menggunakan Jabatan Ini!');
            return redirect('/jabatan');
        } else {
            $jabatan->delete();
            return redirect('/jabatan')->with('success', 'Data Berhasil di Delete');
        }
    }
}
