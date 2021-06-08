<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = Mapel::orderBy('id', 'asc')->paginate(5);
        return view('pages.admin.master.mapel', compact('mapels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.master.mapelCreate');
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = "";
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        $mapel = new Mapel;
        $mapel->name = $request->get('name');
        $mapel->image = $image_name;
        $mapel->save();

        return redirect()->route('mapel.index')
            ->with('succes', 'Mata pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        return view('pages.admin.master.mapelShow', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('pages.admin.master.mapelEdit', compact('mapel'));
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
            'name' => 'required',
            'image' => 'required',
        ]);
        $mapel = Mapel::find($id);
        if ($mapel->image && file_exists('app/public/' . $mapel->image)) {
            \Storage::delete('public/' . $mapel->image);
        }

        $mapel->name = $request->get('name');
        $image_name = $request->file('image')->store('images', 'public');
        $mapel->image = $image_name;
        $mapel->save();

        return redirect()->route('mapel.index')
            ->with('success', 'Mata Pelajaran Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mapel::find($id)->delete();
        return redirect()->route('mapel.index')
            ->with('success', 'Mata Pelajaran Berhasil dihapus');
    }
}
