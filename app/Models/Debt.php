<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debt extends Model
{
    use HasFactory;


      
    protected $table = 'debts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
