<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class metaPage extends Model
{
    use HasFactory;
    protected $fillable=[
        'page_id',
        'content'
    ];

    public function Page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
