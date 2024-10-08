<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function getCategory() : BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category', 'id');
    }
}
