<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'donation_id',
        'payment_meth_type',
        'payment_meth_id',
        'amount',
        'currency',
        'trans_id',
        'status',
    ];
    protected $guarded = [];
    
    public $am = 100;
    
    
    
    // statuses -----------------------------------------------------------------------------------
    public function isPending() {
        return $this->status === 'Pending';
    }
    
    public function isProcessing() {
        return $this->status === 'Processing';
    }
    
    public function isComplete() {
        return $this->status === 'Complete';
    }
    
    public function isFailed() {
        return $this->status === 'Fail';
    }
    
    public function isCanceled() {
        return $this->status === 'Canceled';
    }
    
    // setters ----------------------------------
    public function setPending() {
        $this->status = 'Pending';
    }
    
    public function setProcessing() {
        $this->status = 'Processing';
    }
    
    public function setComplete() {
        $this->status = 'Complete';
    }
    
    public function setFailed() {
        $this->status = 'Fail';
    }
    
    public function setCanceled() {
        $this->status = 'Canceled';
    }
    // statuses end -----------------------------------------------------------------------------------
    
    
    
    public function donation() {
        return $this->belongsTo(Donation::class);
    }  
  
    
}
