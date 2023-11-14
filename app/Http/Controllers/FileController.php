<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;

class FileController extends Controller
{
    public function index()
    {
        return view('file.index', [
            'title' => 'File',
            'data' => File::all()
        ]);
    }

    public function upload()
    {
        return view('file.upload', [
            'title' => 'Upload File',
            'data_user' => User::all()
        ]);
    }

    public function uploadProses(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'jenis_file' => 'required',
            'fileUpload' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:10000'
        ]);

        if ($request->file('fileUpload')) {
            $validatedData['fileUpload'] = $request->file('fileUpload')->store('fileUpload');
        }

        
        DB::beginTransaction();
        try {
            File::create($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'File Gagal diupload ']);
            // something went wrong
        }
        return redirect('/file')->with('success', 'File Berhasil Diupload');
    }

    public function edit($id)
    {
        return view('file.edit', [
            'title' => "Edit Data File",
            'data_user' => User::all(),
            'data' => File::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'jenis_file' => 'required',
            'fileUpload' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:10000'
        ]);

        if ($request->file('fileUpload')) {
            if ($request->file_lama) {
                Storage::delete($request->file_lama);
            }
            $validatedData['fileUpload'] = $request->file('fileUpload')->store('fileUpload');
        }
        DB::beginTransaction();
        try {
            File::where('id', $id)->update($validatedData);
            DB::commit();
            
            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'File Gagal Diupdate ']);
            // something went wrong
        }
        
        return redirect('/file')->with('success', 'File Berhasil Diupdate');
    }
    
    public function delete($id)
    {
        $file = File::findOrFail($id);
        DB::beginTransaction();
        try {
            $file->delete();
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'File Gagal Didelete ']);
            // something went wrong
        }
        
        Storage::delete($file->fileUpload);
        return redirect('/file')->with('success', 'File Berhasil Didelete');
    }

    public function myFile()
    {
        return view('file.myFile', [
            'title' => 'My File',
            'data' => File::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function myFileUpload()
    {
        return view('file.myFileUpload', [
            'title' => 'Upload File'
        ]);
    }

    public function myFileuploadProses(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'jenis_file' => 'required',
            'fileUpload' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:10000'
        ]);

        if ($request->file('fileUpload')) {
            $validatedData['fileUpload'] = $request->file('fileUpload')->store('fileUpload');
        }
        DB::beginTransaction();
        try {
            File::create($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'File Gagal Diupload ']);
            // something went wrong
        }
        
        return redirect('/my-file')->with('success', 'File Berhasil Di Upload');
    }

    public function myFileEdit($id)
    {
        return view('file.myFileEdit', [
            'title' => "Edit Data File",
            'data' => File::findOrFail($id)
        ]);
    }

    public function myFileUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jenis_file' => 'required',
            'fileUpload' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:10000'
        ]);

        if ($request->file('fileUpload')) {
            if ($request->file_lama) {
                Storage::delete($request->file_lama);
            }
            $validatedData['fileUpload'] = $request->file('fileUpload')->store('fileUpload');
        }
        DB::beginTransaction();
        try {
            File::where('id', $id)->update($validatedData);
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'File Gagal Diupdate']);
            // something went wrong
        }
        
        return redirect('/my-file')->with('success', 'File Berhasil Diupdate');
    }
    
    public function myFileDelete($id)
    {
        $file = File::findOrFail($id);
        DB::beginTransaction();
        try {
            $file->delete();
            DB::commit();

            // all good
        } catch (QueryException $e) {
        
            DB::rollback();
            return back()->withErrors(['msg' => 'File Gagal Didelete ']);
            // something went wrong
        }
        
        Storage::delete($file->fileUpload);
        return redirect('/my-file')->with('success', 'File Berhasil Didelete');
    }
}
