<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends BaseModel
{
    protected $table = 'projects';
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'hand_over_date',
        'priority',
        'level',
        'status',
        'leader_id',
        'pm_id',
    ];

    /**
     * Get the company that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the leader that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    /**
     * Get the pm that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pm(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pm_id');
    }
}
