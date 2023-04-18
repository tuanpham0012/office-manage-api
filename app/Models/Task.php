<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends BaseModel
{
    protected $table = 'reservation_assets';
    protected $fillable = [
        'company_id',
        'project_id',
        'user_id',
        'start_date',
        'end_date',
        'priority',
        'level',
        'status',
        'receiver_id',
        'transferred_at',
    ];

    /**
     * Get the company that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the project that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the receiver that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
