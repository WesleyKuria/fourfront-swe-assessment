<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // This makes sure 'total_balance' is always included when returning a User as JSON
    protected $appends = ['total_balance'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationship a usr has many wallets
    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    // Accessor should/will alculate total balance across all the user's wallets
    public function getTotalBalanceAttribute()
    {
        // sums up the 'balance' attribute of each wallet
        return $this->wallets->sum('balance');
    }
}