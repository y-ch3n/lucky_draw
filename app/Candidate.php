<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name'];

    /**
     * a candidate has many winning numbers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function winningNumbers()
    {
        return $this->hasMany(WinningNumber::class);
    }

    /**
     * a candidate has only one result
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
