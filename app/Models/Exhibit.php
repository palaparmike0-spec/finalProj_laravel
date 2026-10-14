<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibit extends Model
{
    /** @use HasFactory<\Database\Factories\ExhibitFactory> */
    use HasFactory;
    protected $fillable = ['title','category_id','artist_id','year_created','gallery_location','status','description'];
public function category() { return $this->belongsTo(Category::class); }
public function artist()   { return $this->belongsTo(Artist::class); }
public function tours()    { return $this->hasMany(Tour::class); }
}
