<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make_id',
        'model',
        'horsepower',
        'year_of_issue',
    ];

    protected $dates = [
        'created_at'
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
