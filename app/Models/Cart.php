<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
    ];
    
    public function stocks()
    {
        return $this->belongsToMany(Stock::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
