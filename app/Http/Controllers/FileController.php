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

        if ($files->count() == 0) {
            $status = false;
        } else {
            $status = true;
        }

        return Inertia::render('Dashboard/Folder', [
            'files' => $files,
            'status' => $status
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
    public function store()
    {

        File::create([
            'user_id' => Auth::user()->id
        ]);

        return back()->with('message', 'Berhasil, Repositor aktif !');
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
        return "200 OK!";
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
        $file = File::where('user_id', $id)->get();

        $request->validate([
            'file_cv' => 'nullable|mimes:pdf',
            'file_porto' => 'nullable|mimes:pdf'
        ]);

        if(!isset($request->file_cv) && !isset($request->file_porto)) {
            return back()->with('fail', 'ga ada yang di upload cuy :(');
        } 

        if ($file[0]->file_cv != null && isset($request->file_cv)) {
            Storage::delete($file[0]->file_cv);
        }

        if ($file[0]->file_porto != null && isset($request->file_porto)) {
            Storage::delete($file[0]->file_porto);
        }

        if (isset($request->file_cv)) {
            $validatedData['file_cv_name'] = $request->file('file_cv')->getClientOriginalName();
            $validatedData['file_cv'] = $request->file('file_cv')->storeAs('cv', $request->file('file_cv')->getClientOriginalName(), 'public');
        }

        if (isset($request->file_porto)) {
            $validatedData['file_porto_name'] = $request->file('file_porto')->getClientOriginalName();
            $validatedData['file_porto'] = $request->file('file_porto')->storeAs('porto', $request->file('file_porto')->getClientOriginalName(), 'public');
        }

        File::where('user_id', $id)->update($validatedData);

        return back()->with('message', 'Berhasil menambahkan file!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy(Request $request, $id)
    {
        

        return $request;
    }

    public function deleteFile(Request $request) {
        $file = File::where('user_id', Auth::user()->id)->get();

        if($request->header == 'porto') {
            Storage::disk('public')->delete($file[0]->file_porto);
            File::where('user_id', Auth::user()->id)->update([
                'file_porto' => null,
                'file_porto_name' => null
            ]);
        }
        else {
            Storage::disk('public')->delete($file[0]->file_cv);
            File::where('user_id', Auth::user()->id)->update([
                'file_cv' => null,
                'file_cv_name' => null
            ]);
        }

        return back()->with('message', 'Berhasil menghapus file!');
    }
}
