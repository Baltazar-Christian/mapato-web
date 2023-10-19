<?php

namespace App\Models;

use App\Models\User;
use App\Models\DebtPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debt extends Model
{
    use HasFactory;



    protected $table = 'debts';
    protected $fillable = [
        'user_id',
        'owner',
        'amount',
        'description',
        // Add other fillable fields as needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function payments()
    {

        return $this->hasMany(DebtPayment::class, 'debt_id', 'id');

    }
}
