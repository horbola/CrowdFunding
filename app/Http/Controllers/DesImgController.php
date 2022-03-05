<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Models\DesImg;
use App\Models\Campaign;

class DesImgController extends Controller
{
    
    public function store(Request $request, $campId) {
        $rules = [
            'file.name' => 'nullable|mimes:jpeg,jpg,png;1',
        ];
        $this->validate($request, $rules);
        
        $campaign = null;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $campaign = Campaign::find($campId);
            $desImg = $this->storeDesImg($image, $campaign);
            $data = [
                'url' => $desImg->image_path,
                'desImgId' => $desImg->id,
            ];
            return Response::json( $data );
        }
        else echo $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
    }

    private function storeDesImg($aFile, $campaign) {
        // file name = 'saif.jpg' here base name is 'saif'
        $image_base_name = str_replace('.' . $aFile->getClientOriginalExtension(), '', $aFile->getClientOriginalName());
        // new image name is built
        $image_name = strtolower(time() . Str::random(5) . '-' . Str::slug($image_base_name)) . '.' . $aFile->getClientOriginalExtension();

        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $desImgPath = 'uploads/descrip/full/';
        $desImgFullPath = $publicPath . '/' . $desImgPath;
        $imagePublicPath = $desImgPath . $image_name;
        $dbPath = '/' . $imagePublicPath;

        if (!file_exists($desImgFullPath)) {
            mkdir($desImgFullPath, 0777, true);
        }
        
        $resized = Image::make($aFile)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        try {
            $resized->save($imagePublicPath);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        $data = [
            'campaign_id' => $campaign->id,
            'image_path' => $dbPath,
        ];
        return $created = DesImg::create($data);
    }
    
    public function destroy($imgId) {
        $publicPath = public_path();
        $desImg = DesImg::find($imgId);
        $previous_photo = $desImg->image_path;
        try {
            if ($previous_photo && file_exists($publicPath . $previous_photo)) {
                unlink($publicPath . $previous_photo);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $desImg->delete();
        return 'success';
    }
    
}
