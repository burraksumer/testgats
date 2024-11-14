<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /**
     * Define a one-to-many relationship.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
