<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Firma;
use App\Models\Zaliha;

class Proizvod extends Model
{
    use HasFactory;


    public function firma()
    {
        return $this->belongsTo(Firma::class);
    }


    public function zaliha()
    {
        return $this->belongsTo(Zaliha::class);
    }
}
