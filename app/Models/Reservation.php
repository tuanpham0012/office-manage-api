<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Reservation extends BaseModel
{
    protected $table = 'reservations';
    protected $fillable = [
        'project_id',
        'company_id',
        'from_date',
        'to_date',
        'long_order',
        'day_in_week',
        'content',
    ];

    /**
     * Get the company that owns the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the project that owns the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    
}
