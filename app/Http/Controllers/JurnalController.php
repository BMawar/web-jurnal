<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Mapel;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //get posts
                $jurnal = Jurnal::latest()->paginate(5);
                $mapel = Mapel::all();

                //render view with posts
                return view('jurnal.index', compact('jurnal','mapel'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all(); // Assuming Mapel is your model
        return view('jurnal.create', compact('mapel'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $jurnal = new Jurnal();

    // Assuming 'mapel_id' is the correct column name
    $jurnal->id_mapel = $request->id_mapel; 
    $jurnal->kehadiran = $request->kehadiran;
    $jurnal->materi = $request->materi;

    $jurnal->save();

    return redirect()->route('jurnal.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit($id)
    {
        // Assuming you are fetching the $jurnal data from your model
    $jurnal = Jurnal::find($id);

    // Assuming you are fetching the $mapel data from your model
    $mapel = Mapel::all();

    return view('jurnal.edit', compact('jurnal', 'mapel'));
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
            'id_mapel' => 'required',
            'kehadiran' => 'required',
            'materi' => 'required',
        ]);
    
            $jurnal =Jurnal::find($id);
            $jurnal->id_mapel = $request->id_mapel;
            $jurnal->kehadiran = $request->kehadiran;
            $jurnal->materi = $request->materi;
            $jurnal->save();

            return redirect()->route('jurnal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurnal = Jurnal::findOrFail($id);
                //delete post
                $jurnal->delete();

                //redirect to index
                return redirect()->route('jurnal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
