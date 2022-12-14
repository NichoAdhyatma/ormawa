<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Join;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\NotifController;
use App\Models\Prestasi;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/IndexAdmin', [
            'joinAcc' => Join::where('status', 1)->get(),
            'joinReject' => Join::where('status', 0)->get(),
            'joinPending' => Join::where('status', null)->get(),
        ]);
    }

    public function mahasiswa()
    {
        return Inertia::render('Admin/MahasiswaAdmin', [
            'users' => User::all()
        ]);
    }

    public function prestasi() {
        return Inertia::render('Admin/RekapPrestasi', [
            'prestasi' => Prestasi::get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ok';
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
        $join = Join::where('id', $id)->get();
        return Inertia::render('Admin/DetailJoin', [
            'join' => $join
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
        $msg = $request->status ? 'Selamat Anda Diterima !' : 'Ditolak !';
        $join = Join::where('id', $id)->get('user_id');
        $organisasi = Organisasi::where('id', $request->id)->get();
        NotifController::notify($organisasi, $join[0]->user_id, $msg);

        if (!$request->status) {
            Join::find($id)->delete();
        }

        Join::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect(route('admin.index'));
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
