<?php

namespace App\Http\Controllers;

use App\Models\DinasLuar;
use App\Models\Shift;
use App\Models\MappingShift;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use DB;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shift.index', [
            'title' => 'Master Shift',
            'shift' => Shift::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shift.create', [
            'title' => 'Tambah Data Master Shift'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_shift' => 'required|max:255',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required'
        ]);

        
        DB::beginTransaction();
        try {
            Shift::create($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal ditambahkan ']);
            // something went wrong
        }
        return redirect('/shift')->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("shift.edit", [
            'title' => 'Edit Shift',
            'shift' => Shift::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_shift' => 'required|max:255',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required'
        ]);

        
        DB::beginTransaction();
        try {
            Shift::where('id', $id)->update($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'Data Gagal diupdate ']);
            // something went wrong
        }
        return redirect('/shift')->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = MappingShift::where('shift_id', $id)->count();
        $check2 = DinasLuar::where('shift_id', $id)->count();
        if ($check > 0 || $check2 > 0) {
            Alert::error('Failed', 'Masih Ada User Yang Menggunakan Shift Ini!');
            return back();
        } else {
            $delete = Shift::find($id);
            DB::beginTransaction();
            try {
                $delete->delete();
                DB::commit();

                // all good
            } catch (QueryException $e) {
            
                DB::rollback();
                return back()->withErrors(['msg' => 'Data Gagal didelete ']);
                // something went wrong
            }
            
        }
        return redirect('/shift')->with('success', 'Data Berhasil didelete');
    }
}
