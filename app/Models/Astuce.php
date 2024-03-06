<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astuce extends Model
{
    use HasFactory;
    protected $fillable = ["label"];
}
