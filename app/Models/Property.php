<?php

namespace App\Models;

use App\Http\Controllers\AuthController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

//    protected $appends = ['is_favorite'];
//    public function is_favorite(): bool
//    {
//        return $this->favorites()->where('user_id', Auth::id())->exists();
//    }

}
