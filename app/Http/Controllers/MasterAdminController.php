<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class MasterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::table('users')->where('votes', 100)->get();
        // $posts = User::where();
        // $search = request()->query('search');
        $search = request()->query('keywords');
        if ($search) {
            // $posts = U/ser::Where('name', 'LIKE', "%($search)%")->paginate(5);
            $posts = User::Where('name', 'LIKE', "%{$search}%")
                ->orderBy('id', 'asc')
                ->paginate(5);
            $posts->appends(['keywords' => $search]);
        } else {
            $posts = User::orderBy('level', 'asc')->paginate(5);
        }
        return view('pages.admin.master.masterAdmin', compact('posts'));
        with('i', (request()->input('page', 1) - 1) * 5);
        // return dd($posts);
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
}
