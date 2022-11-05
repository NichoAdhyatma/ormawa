<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use Inertia\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::where('user_id', Auth::user()->id)->get();

        return Inertia::render('Dashboard/Folder', [
            'files' => $files
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
            'file_cv' => 'mimes:pdf',
            'file_porto' => 'mimes:pdf'
        ]);

        if(!$validatedData || File::where('user_id', Auth::user()->id)->get()->count() > 0) {
            return back()->with('fail', 'Gagal menambahkan file!');
        }

        if (isset($request->file_cv)) {
            $validatedData['file_cv'] = $request->file('file_cv')->store('cv', 'public');
        }

        if (isset($request->file_porto)) {
            $validatedData['file_porto'] = $request->file('file_porto')->store('porto' , 'public');
        }

        $validatedData['user_id'] = Auth::user()->id;

        File::create($validatedData);

        return back()->with('message', 'Berhasil menambahkan file!');
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

    public function download() {
        return Storage::download('2ytvi47W67Rf2yAyykd6oNRnxTk2dkxXhuZPcBvt.pdf');
    }
}
