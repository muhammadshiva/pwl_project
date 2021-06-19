<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = Mapel::orderBy('id', 'asc')->paginate(5);
        return view('pages.guru.mapel-hasil-tugas', compact('mapels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hasil = DB::table('submitions')
            ->join('tugas', 'submitions.id_assigment', '=', 'tugas.id')
            ->join('mapels', 'tugas.id_mapel', '=', 'mapels.id')
            ->select('submitions.*')
            ->where('tugas.id_mapel', '=', $id)
            ->get();
        return view('pages.guru.detail-hasil-tugas', compact('hasil'));
    }

    public function hasilTugasShow($id)
    {
        $hasil = DB::table('submitions')
            ->find($id);
        return view('pages.guru.hasil-tugas-show', compact('hasil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('submitions')->delete($id);
        return redirect()->back()
            ->with('success', 'Tugas berhasil dihapus');
    }
}
