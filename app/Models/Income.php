<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;
    
     protected $table = 'incomes';
     protected $fillable = ['amount', 'source', 'user_id'];

     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
