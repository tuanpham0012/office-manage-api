<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingParticipant extends BaseModel
{
    protected $table = 'meeting_participants';
    protected $fillable = [
        'reservation_calendar_id',
        'user_id',
        'status',
        'position',
    ];

    /**
     * Get the reservationCalendar that owns the MeetingParticipant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservationCalendar(): BelongsTo
    {
        return $this->belongsTo(ReservationCalendar::class);
    }

    /**
     * Get the user that owns the MeetingParticipant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
