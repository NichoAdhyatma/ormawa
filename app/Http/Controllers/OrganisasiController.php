<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Controller;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrganisasiRequest;
use App\Http\Requests\UpdateOrganisasiRequest;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //halaman organisasi di user
    public function index()
    {
        $join = Join::where('status', true)
            ->where('user_id', Auth::user()->id)->get();
        return Inertia::render('Dashboard/Organisasi', [
            'organisasi' => $join,
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
     * @param  \App\Http\Requests\StoreOrganisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganisasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show($idJoin)
    {
        $join = Join::where('id', $idJoin)->where('user_id', Auth::user()->id)->first();
        $anggota = User::whereHas('join', function ($query) use($join) {
            $query->where('organisasi_id', $join->organisasi_id)->where('status', true);
        })->get();

        return Inertia::render('Dashboard/Forum', [
            'join' => $join,
            'anggota' => $anggota,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisasi $organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganisasiRequest  $request
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganisasiRequest $request, Organisasi $organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Join::find($id)->delete();
        return back()->with('message', 'Anda Keluar Organisasi');
    }
}
