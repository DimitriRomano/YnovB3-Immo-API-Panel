<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');

    }
}
