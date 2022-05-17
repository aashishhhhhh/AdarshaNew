<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    const NAMESPACE ='App\Models\page';
    protected $fillable=[
        'slug',
        'title',
        'content',
        'page_type_id',
        'page_id',
        'show_on_home',
        'position',
        'is_approved'
    ];
    
    const SHOW = TRUE;
    const HIDE = FALSE;

   

    public function pageTypes()
    {
        return $this->belongsTo(PageType::class);
    }
    
    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class,'imageable');
    }
    
    public function Parents(): HasMany /* Refrencing own class for parents */
    {
        return $this->hasMany(Page::class,'page_id');
    }

    public function Children(): BelongsTo /* Refrencing own class for children */
    {
        return $this->belongsTo(Page::class,'page_id');
    }

    public function metaPage(): HasMany
    {
        return $this->hasMany(metaPage::class);
    }

    public function scopeParent($query)
    {
        return $query->whereNull('page_id')->whereNotNull('title');
    }
}
