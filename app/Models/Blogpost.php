<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;
    protected $primaryKey = 'blog_post_id';
    protected $table = 'blogposts';

    protected $fillable = [
        'title',
        'content',
        'image_url',
        'category_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function likes()
    {
        return $this->hasMany(Blogpostshaslikes::class, 'blog_post_id', 'blog_post_id');
    }
}
