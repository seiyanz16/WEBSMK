<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandKomp extends Model
{
    use HasFactory;

    protected $table = 'standarkompetensi';
    protected $fillable = [
        'standarkompetensi',
        'kdbidstudi'
    ];
    
    public function fbidstudi(){
        return $this->belongsTo(BidangStudi::class, 'kdbidstudi', 'id');
        } 
}
