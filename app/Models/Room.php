<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends BaseModel
{
    protected $table = 'reservation_assets';
    protected $fillable = [
        'company_id',
        'reservation_id',
        'room_id',
        'in_date',
        'start_time',
        'end_time',
        'status',
        'note',
    ];

    /**
     * Get the company that owns the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the reservation that owns the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    /**
     * Get the room that owns the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
