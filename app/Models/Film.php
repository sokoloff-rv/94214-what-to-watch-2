<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public const STATUS_READY = 'ready';
    public const STATUS_PENDING = 'pending';
    public const STATUS_MODERATE = 'moderate';

    protected $fillable = [
        'name',
        'poster_image',
        'preview_image',
        'background_image',
        'background_color',
        'video_link',
        'preview_video_link',
        'description',
        'director',
        'released',
        'run_time',
        'rating',
        'scores_count',
        'imdb_id',
        'status',
    ];

    protected $casts = [
        'released' => 'integer',
        'rating' => 'decimal:1',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_film');
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_favorites');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
