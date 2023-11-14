<?php

namespace App\Http\Controllers;

use App\Models\AutoShift;
use App\Models\Jabatan;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class AutoShiftController extends Controller
{
    public function index()
    {
        return view('autoshift.index', [
            'title' => 'Master Jadwal/Shift Otomatis',
            'data' => AutoShift::all()
        ]);
    }

    public function tambah()
    {
        return view('autoshift.tambah', [
            'title' => 'Tambah Data Auto Shift',
            'data_jabatan' => Jabatan::all(),
            'shift' => Shift::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "jabatan_id" => 'required',
            "shift_id" => 'required',
        ]);

        DB::beginTransaction();
        try {
            AutoShift::create($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal Ditambahkan']);
            // something went wrong
        }
        
        return redirect('/auto-shift')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        return view('autoshift.edit', [
            'title' => 'Edit Data Auto Shift',
            'auto_shift' => AutoShift::findOrFail($id),
            'data_jabatan' => Jabatan::all(),
            'shift' => Shift::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "jabatan_id" => 'required',
            "shift_id" => 'required',
        ]);
        DB::beginTransaction();
        try {
            AutoShift::where('id', $id)->update($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal Diupdate ']);
            // something went wrong
        }
        
        return redirect('/auto-shift')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
       
        DB::beginTransaction();
        try {
            $delete = AutoShift::find($id);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal ']);
            // something went wrong
        }
        
        return redirect('/auto-shift')->with('success', 'Data Berhasil di Delete');
    }
}
