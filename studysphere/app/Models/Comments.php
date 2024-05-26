<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    // public $timestamps = false;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'author_name',        
        'comment',
        'status',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
