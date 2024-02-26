<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $mapel = Mapel::latest()->paginate(5);
        $guru = Guru::all(); // assuming you have a Guru model

        //render view with posts
        return view('mapel.index', compact('mapel', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all(); // assuming you have a Guru model
        return view('mapel.create', compact('guru'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new Mapel();
        $mapel->id_guru = $request->id_guru;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $guru = Guru::all();

        $mapel = Mapel::find($id);
        return view('mapel.edit', compact('mapel', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        // Validate form data
        $request->validate([
            'id_guru' => 'required',
            'nama_mapel' => 'required',
        ]);
    
        // Update Peminjaman instance
        $mapel->update([
            'id_guru' => $request->id_guru,
            'nama_mapel' => $request->nama_mapel,
        ]);
    
        // Redirect to the index page with a success message
        return redirect()->route('mapel.index')->with('success', 'Data Peminjaman Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
                //delete post
                $mapel->delete();

                //redirect to index
                return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}