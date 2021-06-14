<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Tugas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = Mapel::orderBy('id', 'asc')->paginate(5);
        return view('pages.guru.home', compact('mapels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tugas = Tugas::find($id);
        // return view('pages.guru.tugas-create', compact('tugas'));
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
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'duedate' => 'required',
            'file' => 'required',
            'id_mapel' => 'required',
        ]);

        $file_tugas = "";
        if ($request->file('file')) {
            $file_tugas = $request->file('file')->store('files', 'public');
        }

        $tugas = new Tugas;
        $tugas->deskripsi = $request->get('deskripsi');
        $tugas->tanggal = $request->get('tanggal');
        $tugas->duedate = $request->get('duedate');
        $tugas->file = $file_tugas;
        $tugas->id_mapel = $request->get('id');
        $tugas->save();

        return redirect()->route('guru.index')
            ->with('success', 'Tugas berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tugas = Tugas::where('id_mapel', $id)
            ->orderBy('id_mapel', 'asc')
            ->get();
        return view('pages.guru.tugas', compact('tugas', 'id'));
        // return dd($tugas);
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
        //
    }

    public function tambahTugas($id)
    {
        $tugas = Tugas::find($id);
        return view('pages.guru.tugas-create', compact('tugas'));
    }
}
