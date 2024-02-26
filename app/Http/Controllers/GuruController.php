<?php

namespace App\Http\Controllers;

use App\Models\Guru;
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
        //get posts
        $gurus = Guru::latest()->paginate(5);

        //render view with posts
        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //validate form
                $this->validate($request, [
                    'nama_guru'     => 'required',
                ]);
        
                //create post
                Guru::create([
                    'nama_guru'     => $request->nama_guru,
                ]);
        
                //redirect to index
                return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
        
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
        // Fetch the specific Guru record based on $id
    $guru = Guru::findOrFail($id);

    // Pass the $guru variable to the 'guru.edit' view
    return view('guru.edit', compact('guru'));
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
                // Validate the form
    $this->validate($request, [
        'nama_guru' => 'required',
    ]);

    try {
        // Fetch the specific Guru record based on $id
        $guru = Guru::findOrFail($id);

        // Update the Guru record
        $guru->update([
            'nama_guru' => $request->nama_guru,
            // Add any other fields you want to update here
        ]);

        // Redirect to index with success message
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diubah!']);
    } catch (\Exception $e) {
        // Handle any exceptions if the record is not found or other issues
        return redirect()->route('guru.index')->with(['error' => 'Gagal mengubah data.']);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Fetch the specific Guru record based on $id
            $guru = Guru::findOrFail($id);
    
            // Delete the Guru record
            $guru->delete();
    
            // Redirect to index with success message
            return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (\Exception $e) {
            // Handle any exceptions if the record is not found or other issues
            return redirect()->route('guru.index')->with(['error' => 'Gagal menghapus data.']);
        }
    }
}
