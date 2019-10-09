<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinningNumber extends Model
{
    protected $fillable = ['number', 'candidate'];

    /**
     * belongs to one candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
