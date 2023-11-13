<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use DB;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
           try {
                $validatedData = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email:dns|unique:users',
                    'password' => 'required|confirmed|min:6'
                ]);
                $validatedData['password'] = Hash::make($validatedData['password']);
                DB::beginTransaction();


                try {
                    $users = User::create($validatedData);
                    DB::commit();

                    // all good
                } catch (QueryException $e) {
                
                    DB::rollback();
                    return ApiFormatter::createApi(400, 'Failed');
                    // something went wrong
                }
            
                $data = User::where('id', $users->id);
                
                if($data){
                    return ApiFormatter::createApi(200, 'Success', $data);
                }else{
                    return ApiFormatter::createApi(400, 'Failed');
                }
           } catch(Exception $error) {
                return ApiFormatter::createApi(400, 'Failed');
           }
    }
}
