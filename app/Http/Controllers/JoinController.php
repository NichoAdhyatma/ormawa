<?php

namespace App\Http\Controllers;

use App\Models\Join;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    public function getJoin($id) {
        return Join::where('id', $id)->get();
    }

    public function setStatus(Request $request) {
        return 'ok! ';
    }
}
