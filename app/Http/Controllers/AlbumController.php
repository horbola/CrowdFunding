<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function destroy($id) {
        return redirect()->back();
    }
}
