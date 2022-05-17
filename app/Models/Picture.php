<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = ['url','imageable_id','imageable_type','is_banner','description'];

    public function imageable() :MorphTo
    {
        return $this->morphTo();
    }

    public function scopeBanner($query)
    {
        return $query->where('is_banner',1);
    }

    public function scopeNotBanner($query)
    {
        return $this->where('is_banner',0);
    }
}
