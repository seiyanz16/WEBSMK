<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidangStudi extends Model
{
    use HasFactory;

    protected $table = 'bidang_studis';
    protected $fillable = [
        'bidangstudi'
    ];

    public function standkomp(){
        return $this->belongsTo('App\Models\StandKomp');
    }
}
