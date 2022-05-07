<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude'];

    public function properties()
    {
        return $this->belongsTo(Property::class);
    }
}
