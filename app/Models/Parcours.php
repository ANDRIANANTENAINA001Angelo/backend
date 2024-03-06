<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parcours extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'label',
        "mention"
    ];

    public function mention():BelongsTo{
        return $this->belongsTo(Mention::class);
    }

}
