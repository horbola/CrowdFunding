<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Document;
use App\Library\Helper;

class DocumentController extends Controller
{
    public function destroy($id) {
        $documentPhoto = Document::find($id);
        if( !$documentPhoto->canBeDeleted() )
            return redirect()->back();
        Helper::deleteImage($documentPhoto->image_path, $thumbImage='');
        $deleted = $documentPhoto->delete();
        return redirect()->back();
    }
}
