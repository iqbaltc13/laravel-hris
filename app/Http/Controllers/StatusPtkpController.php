<?php

namespace App\Http\Controllers;

use App\Models\StatusPtkp;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class StatusPtkpController extends Controller
{
    public function index(Request $request)
    {
        $data = StatusPtkp::orderBy('id', 'DESC');

        if($request['search']){
            $data = StatusPtkp::orderBy('id', 'DESC')->where('name', 'LIKE', '%'.$request['search'].'%');
        } else {
            $data = StatusPtkp::orderBy('id', 'DESC');
        }
        return view('statusPtkp.index', [
            'title' => 'Master Status Pegawi',
            'data' => $data->paginate(10)->withQueryString()
        ]);
    }

    public function tambah()
    {
        return view('statusPtkp.tambah', [
            'title' => 'Tambah Data Status'
        ]);
    }

    public function tambahProses(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ptkp_2016' => 'required',
            'ptkp_2015' => 'nullable',
            'ptkp_2009_2012' => 'nullable',
        ]);

        if(!$validated['ptkp_2015']){
            $validated['ptkp_2015'] = 0;
        }

        if(!$validated['ptkp_2009_2012']){
            $validated['ptkp_2009_2012'] = 0;
        }

        $validated['ptkp_2016'] = str_replace(',', '', $validated['ptkp_2016']);
        $validated['ptkp_2015'] = str_replace(',', '', $validated['ptkp_2015']);
        $validated['ptkp_2009_2012'] = str_replace(',', '', $validated['ptkp_2009_2012']);

        
        DB::beginTransaction();
        try {
            StatusPtkp::create($validated);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal ditambahkan ']);
            // something went wrong
        }
        return redirect('/status-ptkp')->with('success', 'Data Berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('statusPtkp.edit', [
            'title' => 'Edit Data Status PTKP',
            'data' => StatusPtkp::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ptkp_2016' => 'required',
            'ptkp_2015' => 'nullable',
            'ptkp_2009_2012' => 'nullable',
        ]);

        if(!$validated['ptkp_2015']){
            $validated['ptkp_2015'] = 0;
        }

        if(!$validated['ptkp_2009_2012']){
            $validated['ptkp_2009_2012'] = 0;
        }

        $validated['ptkp_2016'] = str_replace(',', '', $validated['ptkp_2016']);
        $validated['ptkp_2015'] = str_replace(',', '', $validated['ptkp_2015']);
        $validated['ptkp_2009_2012'] = str_replace(',', '', $validated['ptkp_2009_2012']);

        
        DB::beginTransaction();
        try {
            StatusPtkp::where('id', $id)->update($validated);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal diupdate ']);
            // something went wrong
        }
        return redirect('/status-ptkp')->with('success', 'Data Berhasil diupdate');
    }

    public function delete($id)
    {
        
        DB::beginTransaction();
        try {
            StatusPtkp::where('id', $id)->delete();
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal dihapus ']);
            // something went wrong
        }
        return redirect('/status-ptkp')->with('success', 'Data Berhasil dihapus');
    }

}
