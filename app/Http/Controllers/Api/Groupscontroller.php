<?php

namespace App\Http\Controllers\Api;
use App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success'=> true,
            'message'=> 'Daftar Data Grup',
            'data'=> $groups
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => $request->nama,
            'description' => $request->description
        ]);

        $groups = Groups::create([
            'nama' => $request->nama,
            'description' => $request->description
        ]);
        if($groups)
        {
            return response()->json([
                'success' => true,
                'message' => 'Grup berhasil di tambahkan',
                'data' => $groups
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Grup gagal di tambahkan',
                'data' => $groups
            ],409);
        
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Groups::where('id', $id)->first();
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Grup',
            'data'    => $groups
        ], 200);
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
        $groups = Groups::find($id)
        ->update([
            'nama' => $request->nama,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Grup Berhasil Di Ubah',
            'data'    => $groups
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Grup Berhasil Di Hapus',
            'data'    => $groups
        ], 200);
    }
}
