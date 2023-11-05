<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bookmarks extends Model
{
    // use HasFactory;
    use \Laravel\Sanctum\HasApiTokens, HasFactory, Notifiable;

    protected $table = 'bookmarks'; // The name of the bookmarks table in the database

    // Define the fields that are fillable in the database
    protected $fillable = ['user_id', 'article_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id'); // Define the relationship with the User model
    }

    public function news()
    {
        return $this->belongsTo(News::class, 'article_id'); // Define the relationship with the NewsArticle model
    }
}
