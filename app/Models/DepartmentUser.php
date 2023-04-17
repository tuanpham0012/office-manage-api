<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentUser extends BaseModel
{
    protected $table = 'department_user';
    protected $fillable = [
        'department_id',
        'user_id',
        'status',
        'position',
    ];

    /**
     * Get the department that owns the DepartmentUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the user that owns the DepartmentUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
