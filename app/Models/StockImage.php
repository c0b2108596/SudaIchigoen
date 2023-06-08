<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'stock_id',
        "url"
    ];
    
    public function stock()
    {
        return $this->belogsTo(Stock::class);
    }
}
