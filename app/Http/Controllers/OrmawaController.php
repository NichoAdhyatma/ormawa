<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\Organisasi;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Join::where('user_id', Auth::user()->id)->get();
        $acc = Join::where('user_id', Auth::user()->id)->where('status', true)->count();
        $achv = Prestasi::where('user_id', Auth::user()->id)->count();
        return Inertia::render('Dashboard/MyOrmawa', [
            'items' => $item,
            'acc' => $acc,
            'achive' => $achv
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasi = Organisasi::where('jurusan_id', Auth::user()->jurusan_id)->orWhere('category_id', 2)->get();
        return Inertia::render('Dashboard/FormDaftar', [
            'organisasi' => $organisasi
        ]);
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
            'organisasi_id' => 'required',
        ]);

        if (
            Join::where('organisasi_id', $request->organisasi_id)
            ->where('user_id', Auth::user()->id)->count() > 0
        ) {
            return back()->with('fail', 'maaf anda sudah mendaftar di organiasi ini!');
        }

        if (!Organisasi::where('jurusan_id', Auth::user()->jurusan_id)->orWhere('category_id', 2)->get()) {
            return back()->with('fail', 'maaf anda tidak bisa mendaftar di organiasi ini!');
        }

        $validatedData['user_id'] = Auth::user()->id;

        if ($validatedData) {
            $join = Join::create($validatedData);
            return redirect('/dashboard/ormawa/' . $join->id)->with('message', 'anda sudah mendaftar!');
        }
        return back()->with('fail', 'pendaftaran gagal...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $join = Join::where('id', $id)->get();
        return Inertia::render('Dashboard/PdfReport', [
            'join' => $join[0]
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function edit(Join $join)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Join $join)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function destroy(Join $join)
    {
        //
    }
}
