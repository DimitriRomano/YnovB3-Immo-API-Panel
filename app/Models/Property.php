<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function localisation()
    {
        return $this->hasOne(Localisation::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
