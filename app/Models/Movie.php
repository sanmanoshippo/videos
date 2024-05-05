<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $fillable =['title','movie_url','description'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
