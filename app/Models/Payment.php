<?php

namespace App\Models;

use App\Models\Savings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = ['payment'];

    public function savingGoal()
    {

        return $this->belongsTo(Savings::class, 'saving_id', 'id');

    }
}
