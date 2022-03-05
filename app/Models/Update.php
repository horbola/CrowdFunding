<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
    protected $fillable = ['campaign_id', 'descrip'];
    
    public function updateItems() {
        return $this->hasMany(UpdateItem::class);
    }
    
    public function campaign() {
        // Campaign::find($this->campaign_id);
        return $this->belongsTo(Campaign::class);
    }
}
