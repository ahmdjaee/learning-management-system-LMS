<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateBuilder extends Model
{
    protected $guarded = ['show_grid'];

     // Accessor untuk mendapatkan URL background image
    public function getBackgroundUrlAttribute()
    {
        return $this->background ? asset($this->background) : null;
    }

    // Accessor untuk mendapatkan URL signature image
    public function getSignatureUrlAttribute()
    {
        return $this->signature ? asset($this->signature) : null;
    }
}
