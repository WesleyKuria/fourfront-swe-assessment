<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'name'];

    // Automatcally append the calculated balance to API responses
    protected $appends = ['balance'];

    // Relationship, A wallet belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship A wallet has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Accessor, Calculate the balance dynamically
    public function getBalanceAttribute()
    {
        $income = $this->transactions()->where('type', 'income')->sum('amount');
        $expense = $this->transactions()->where('type', 'expense')->sum('amount');
        
        return $income - $expense;
    }
}