<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $tugas = Tugas::find($id);
        $tugas = Tugas::find($id);
        return view('pages.siswa.tugasShowId', compact('tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Tugas::find($id);
        return view('pages.siswa.tugasCreate', compact('tugas'));
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
        $request->validate([
            'file_result' => 'required',
        ]);
        $tugas = Tugas::find($id);
        if ($tugas->file_result && file_exists('app/public/' . $tugas->file_result)) {
            \Storage::delete('public/' . $tugas->file_result);
        }

        $file_result_name = $request->file('file_result')->store('fileSiswa', 'public');
        $tugas->file_result = $file_result_name;
        $tugas->save();

        return redirect()->back()
            ->with('success', 'Tugas anda berhasil di upload');
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
}
