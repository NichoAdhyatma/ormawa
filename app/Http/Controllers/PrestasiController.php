<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPrestasi;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = CategoryPrestasi::all();
        $achive = Prestasi::where('user_id', Auth::user()->id)->get();

        return Inertia::render('Dashboard/Prestasi/index', [
            'type' => $type,
            'achive' => $achive,
        ]);
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

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'sertif' => 'required',
            'category_prestasi_id' => 'required',
        ]);

        $validatedData['sertif'] = $request->file('sertif')->storeAs('sertif', $request->file('sertif')->getClientOriginalName(), 'public');
        $validatedData['user_id'] = Auth::user()->id;

        if ($validatedData) {
            Prestasi::create($validatedData);
            return back()->with('message', 'Berhasil Menambahkan Prestasi');
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
        return Inertia::render('Dashboard/Prestasi/edit', [
            'data' => Prestasi::find($id),
            'type' => CategoryPrestasi::all(),
        ]);
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
        return $request->sertif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prestasi::where('id', $id)->delete();

        return back()->with('message', 'berhasil menghapus!');
    }
}
