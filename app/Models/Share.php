<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'shared_link'];
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
}
