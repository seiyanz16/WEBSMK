<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kompKeahlian extends Model
{
    use HasFactory;

    protected $table = 'komptensikeahlian';
    protected $fillable = [
        'komptensikeahlian',
        'kdstandkomp'
    ];

    public function fstandkomp(){
        return $this->belongsTo(StandKomp::class, 'kdstandkomp', 'id');
    }
}
