<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

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

        return Inertia::render('Dashboard/MyOrmawa', [
            'items' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasi = Organisasi::all();
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
            'file_cv' => 'required|mimes:pdf',
            'file_porto' => 'nullable|mimes:pdf'
        ]);

        if (Join::where('organisasi_id', $request->organisasi_id)
                ->where('user_id', Auth::user()->id)->count() > 0) {
            return back()->with('fail', 'maaf anda sudah mendaftar di organiasi ini');
        }

        $validatedData['file_cv'] = $request->file('file_cv')->store('cv');
        $validatedData['user_id'] = Auth::user()->id;

        Join::create($validatedData);
        return back()->with('message', 'anda sudah mendaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function show(Join $join)
    {
        //
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
