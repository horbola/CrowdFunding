<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Like;

class LikeController extends Controller
{
    
    
    public function update(Request $request, $campaignId) {
        if(Auth::check()){
            $created = null;
            $like = Like::whereUserId(Auth::user()->id)->whereCampaignId($campaignId);
            if($like->count()){
                $like->delete();
            }
            else {
                $created = Like::create([
                    'user_id' => Auth::user()->id,
                    'campaign_id' => $campaignId,
                ]);
            }
            
            //check if request comes via ajax?
            if ($request->ajax()) {
                return ['campaignId' => $campaignId, 'created' => $created];
            }
        }
    }
}
