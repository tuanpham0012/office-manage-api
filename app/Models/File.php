<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends BaseModel
{
    protected $table = 'file';
    protected $fillable = [
        'url',
        'name',
        'user_id',
    ];

    /**
     * Get the user that owns the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}


