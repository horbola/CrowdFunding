<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['campaign_id', 'image_path', 'video_path', 'text'];
    
    
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
    
    public function thumbnail() {
        
    }
    
    public function canBeDeleted() {
        $campaigner = $this->campaign->campaigner;
        if(!Auth::check()) return false;
        $creator = $campaigner->id === Auth::user()->id;
        $canDelete = ($creator && $this->campaign->isCampPending()) || Auth::user()->isAdmin();
        return $canDelete;
    }
}
