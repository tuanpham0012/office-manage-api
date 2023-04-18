<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationAsset extends BaseModel
{
    protected $table = 'reservation_assets';
    protected $fillable = [
        'reservation_calendar_id',
        'asset_id',
        'status',
    ];

    /**
     * Get the reservationCalendar that owns the ReservationAsset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservationCalendar(): BelongsTo
    {
        return $this->belongsTo(ReservationCalendar::class);
    }

    /**
     * Get the asset that owns the ReservationAsset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }
}
