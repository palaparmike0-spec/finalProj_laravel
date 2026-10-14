<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    /** @use HasFactory<\Database\Factories\TourFactory> */
    use HasFactory;
    protected $fillable = ['title','exhibit_id','guide_name','tour_date','capacity','price','description'];
public function exhibit()  { return $this->belongsTo(Exhibit::class); }
public function visitors() { return $this->hasMany(Visitor::class); }
}
