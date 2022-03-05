<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

use App\Models\Update;
use App\Models\UpdateItem;
use App\Models\Campaign;

class UpdateController extends Controller
{
    public function store(Request $request, $campaignId) {
        $rules = [
            'update_descrip' => 'text',
            'updates' => 'mimes|jpg,png,gif,pdf',
        ];
        //$this->validate($request, $rules);
        
        $campaign = Campaign::find($campaignId);
        $created = Update::create([
            'campaign_id' => $campaign->id,
            'descrip' => $request->update_descrip,
        ]);
        if($request->hasFile('updates')){
            foreach ($request->file('updates') as $aFile) {
                $this->storeUpdates($aFile, $created);
            }
        }

        if ($created) {
             return back()->with('success', 'Update files have been uploaded');
        }
        return back()->with('error', 'Somethis went wrong. Please try again');
    }
    
    private function storeUpdates($aFile, $createdUpdate) {
        // file name = 'saif.jpg' here base name is 'saif'
        $image_base_name = str_replace('.' . $aFile->getClientOriginalExtension(), '', $aFile->getClientOriginalName());
        // new image name is built
        $image_name = strtolower(time() . Str::random(5) . '-' . Str::slug($image_base_name)) . '.' . $aFile->getClientOriginalExtension();

        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $imagePath = 'uploads/updates/';
        $imageFullPath = $publicPath . '/' . $imagePath;
        $imagePublicPath = $imagePath . $image_name;
        $dbPath = '/' . $imagePublicPath;

        if (!file_exists($imageFullPath)) {
            mkdir($imageFullPath, 0777, true);
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
            'update_id' => $createdUpdate->id,
            'image_path' => $dbPath,
        ];
        UpdateItem::create($data);
    }
}
