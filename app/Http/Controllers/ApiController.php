<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Class ApiController
 * @package App\Http\Controllers
 * @author  Daud Valentino Simbolon <daud.simbolon@gmail.com>
 */
class ApiController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'keyword' => 'required'
        ],[
            'keyword.required' => 'keyword tidak boleh kosong'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ],400);
        }

        $keyword = $request->get('keyword');

        $query = " SELECT *  FROM CabangKonvent WHERE LOWER(branchfullname) LIKE LOWER('%" .$keyword . "%')";

        $data = DB::select($query);
        $data = collect($data);

        if(!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Branch tidak ditemukan.!'
            ],404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sukses',
            'data' => $data
        ],200);



    }

}