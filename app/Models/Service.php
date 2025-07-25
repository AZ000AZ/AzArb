<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // İzin verilen sütunlar (mass assignable)
    protected $fillable = [
        'name',
        'category',
        'location',
        'available_date',
    ];
}
