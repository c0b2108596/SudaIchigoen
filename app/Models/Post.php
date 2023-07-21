<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];
    
    //ページネーション
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで制限する
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //ホームページで表示するお知らせを最新5件に制限
    public function getByLimit(int $limit_count = 5)
    {
        //update_atで降順に並べたあと、limitで制限する
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function post_images()
    {
        return $this->hasMany(PostImage::class);
    }
    
}
