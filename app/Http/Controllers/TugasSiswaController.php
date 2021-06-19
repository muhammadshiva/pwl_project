<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Submitions;
use App\Models\Tugas;
use App\Models\User;
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

    public function createAssigment($id)
    {
        $tugas = Tugas::find($id);
        $mapel = Mapel::find($id);
        return view('pages.siswa.tugasCreate', compact('tugas', 'mapel'));
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
            'name_student' => 'required',
            'title' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
        ]);

        $file_name = "";
        if ($request->file('file')) {
            $file_name = $request->file('file')->store('fileSiswa', 'public');
        }

        $submitions = new Submitions;
        $submitions->name_student = $request->get('name_student');
        $submitions->title = $request->get('title');
        $submitions->comment = $request->get('comment');
        $submitions->file = $file_name;
        $submitions->id_assigment = $request->get('id_assigment');
        $submitions->save();

        return redirect()->back()
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
            // 'file_result' => 'required',
            'name_student' => 'required',
            'file' => 'required',
        ]);
        $submitions = Submitions::find($id);
        if ($submitions->file && file_exists('app/public/' . $submitions->file)) {
            \Storage::delete('public/' . $submitions->file);
        }

        $file_name = $request->file('file')->store('fileSiswa', 'public');
        $submitions->file = $file_name;
        $submitions->save();

        return redirect()->route('tugas-siswas.index')
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
