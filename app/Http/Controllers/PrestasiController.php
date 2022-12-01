<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Models\CategoryPrestasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $validatedData['sertif_path'] = $request->file('sertif')->storeAs('sertif', $request->file('sertif')->getClientOriginalName(), 'public');
        $validatedData['sertif'] = $request->file('sertif')->getClientOriginalName();
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
        $prestasi = Prestasi::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_prestasi_id' => 'required',
            'sertif' => 'nullable|mimes:pdf,jpg,png',
        ]);

        if($prestasi->sertif_path != null && isset($request->sertif)) {
            Storage::delete($request->sertif);
        }

        if (isset($request->sertif)) {
            $validatedData['sertif_path'] = $request->file('sertif')->storeAs('sertif', $request->file('sertif')->getClientOriginalName(), 'public');
            $validatedData['sertif'] = $request->file('sertif')->getClientOriginalName();
        }
        else {
            $validatedData['sertif_path'] = $prestasi->sertif_path;
            $validatedData['sertif'] = $prestasi->sertif;
        }

        Prestasi::where('id', $id)->update($validatedData);

        return redirect(route('prestasi.index'))->with('message', 'berhasil di ubah!');
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
