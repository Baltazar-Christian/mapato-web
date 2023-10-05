<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Savings extends Model
{
    use HasFactory;
    protected $table = 'savings';

    protected $fillable = ['id','amount', 'description', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {

        return $this->hasMany(Payment::class, 'saving_id', 'id');

    }
}
