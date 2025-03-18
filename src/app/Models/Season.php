<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = [
        'neme'
    ];

    public function product()
    {
        return $this->belongsToMany(Season::class);
    }
}
