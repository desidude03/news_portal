<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

// use Illuminate\Foundation\Auth\User as Authenticatable;

class News extends Model
{
    use \Laravel\Sanctum\HasApiTokens, HasFactory, Notifiable;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'date',
        'source',
        'is_bookmark'
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'id'); // Define the relationship with the NewsArticle model
    }
    public function article()
    {
        return $this->belongsTo(News::class, 'article_id');
    }

}
