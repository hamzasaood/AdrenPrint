<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DtfColor extends Model
{
    use HasFactory;
    protected $fillable = [
        'key', 'label', 'surcharge', 'is_active','type',
    ];
}
