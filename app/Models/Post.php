<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['user_id', 'title', 'content'];

    protected $fillable = [
        'title',
        'content',
        'is_published', // Assuming you have a field to track if a post is published.
        'user_id', // Assuming you have a foreign key to associate posts with users.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define an accessor to check if the post is published.
    public function getIsPublishedAttribute()
    {
        return $this->attributes['is_published'] === 1;
    }
}
