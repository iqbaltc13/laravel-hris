<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Tunjangan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class TunjanganController extends Controller
{
    public function index()
    {
        return view('tunjangan.index', [
            'title' => 'Master Tunjangan',
            'data' => Tunjangan::all(),
        ]);
    }

    public function tambah()
    {
        return view('tunjangan.tambah', [
            'title' => 'Tambah Data Tunjangan',
            'data_golongan' => Golongan::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function tambahProses(Request $request)
    {
        $request['tunjangan_makan'] = str_replace(',', '', $request['tunjangan_makan']);
        $request['tunjangan_transport'] = str_replace(',', '', $request['tunjangan_transport']);
        $validated = $request->validate([
            'golongan_id' => 'required',
            'tunjangan_makan' => 'required',
            'tunjangan_transport' => 'required',
        ]);

        
        DB::beginTransaction();
        try {
            Tunjangan::create($validated);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal ditambahkan ']);
            // something went wrong
        }   
        return redirect('/tunjangan')->with('success', 'Data Berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('tunjangan.edit', [
            'title' => 'Edit Data Tunjangan',
            'data' => Tunjangan::find($id),
            'data_golongan' => Golongan::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request['tunjangan_makan'] = str_replace(',', '', $request['tunjangan_makan']);
        $request['tunjangan_transport'] = str_replace(',', '', $request['tunjangan_transport']);
        $validated = $request->validate([
            'golongan_id' => 'required',
            'tunjangan_makan' => 'required',
            'tunjangan_transport' => 'required',
        ]);

        
        DB::beginTransaction();
        try {
            Tunjangan::where('id', $id)->update($validated);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal diupdate']);
            // something went wrong
        }
        return redirect('/tunjangan')->with('success', 'Data Berhasil diupdate');
    }

    public function delete($id)
    {
        
        DB::beginTransaction();
        try {
            Tunjangan::where('id', $id)->delete();
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal didelete ']);
            // something went wrong
        }
        return redirect('/tunjangan')->with('success', 'Data Berhasil didelete');
    }
}
