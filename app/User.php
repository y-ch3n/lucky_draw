<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** check if the user is admin
     * @return bool
     */
    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    /**
     * one user can belong to many roles
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * one user can have many winning numbers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function winningNumbers()
    {
        return $this->hasMany(WinningNumber::class);
    }

    /**
     * a user can have only one result
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
