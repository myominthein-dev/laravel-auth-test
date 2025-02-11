<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    public $fillable = ['title','description','category_id','user_id'];

    public function user () : BelongsTo {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category () : BelongsTo {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
