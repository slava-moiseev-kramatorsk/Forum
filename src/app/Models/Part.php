<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'draft',
        'name',
        'provider',
        'value'
    ];
    use HasFactory;
}
