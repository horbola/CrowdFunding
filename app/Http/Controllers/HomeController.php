<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Oporajoy Crowd Funding';
        $camps = Campaign::whereIsPicked(1)->get();
        return view('face.home-offerus', compact('camps', 'title'));
    }
    
    public function searchCamp() {
        if( request()->ajax() ){
            $rules = ['q' => 'string:500', 'searching' => 'integer:1'];
            $validated = request()->validate($rules);
            $campaigns = Campaign::where('title', 'like', "%{$validated['q']}%")->
                            orWhere('slug', 'like', "%{$validated['q']}%")->
                            orWhere('short_description', 'like', "%{$validated['q']}%")->
                            orWhere('description', 'like', "%{$validated['q']}%")->paginate(15)->withQueryString();

            $campsCollect = $campaigns->getCollection()->filter(function($aCamp) {
                return $aCamp->isActive();
            });
            $campaigns->setCollection($campsCollect);
            return $this->buildSearRes($campaigns);
        }
    }
    
    
    // <a href="' .route('user.show', ['id' => $campaign->campaigner->id]). '" class="text-dark user">' .$campaign->campaigner->name. '</a>
    private function buildSearRes($campaigns) {
        if($campaigns){
            $searRes = '';
            foreach($campaigns as $campaign){
                $searRes .= '<div class="teacher d-flex align-items-center my-3">'
                    .'<a href="'  .route('campaign.showGuestCampaign', $campaign->id).  '"><img src="' .$campaign->thumbImagePath(). '" class="avatar avatar-md-sm rounded-circle shadow" alt=""></a>'
                    .'<div class="ms-2">'
                        .'<h6 class="mb-0">' .$campaign->campaigner->name. '</h6>'
                        .'<p class="text-dark small my-0 py-0 px-0">' .$campaign->campaigner->location(). '</p>'
                        .'<p class="text-dark small my-0 py-0 px-0">' .$campaign->title. '</p>'
                    .'</div>'
                .'</div>';
            }
            
            $pagination = '<div class="pagination">'
                            .'<button type="button" class="btn btn-sm btn-primary mx-auto searchNext" onclick="exeAjax(' .$campaigns->nextPageUrl(). ')">Next</button>'
                        .'</div>';
            
            return $searRes . $pagination;
        }
    }
    
}
