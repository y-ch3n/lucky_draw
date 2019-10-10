<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinningNumber extends Model
{
    protected $fillable = ['number', 'user_id'];

    /**
     * belongs to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
