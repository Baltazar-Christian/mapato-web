<?php

namespace App\Models;

use App\Models\Debt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DebtPayment extends Model
{
    use HasFactory;

    protected $table = 'debt_payments';

    protected $fillable = ['payment'];

    public function Debt()
    {

        return $this->belongsTo(Debt::class, 'debt_id', 'id');

    }
}
