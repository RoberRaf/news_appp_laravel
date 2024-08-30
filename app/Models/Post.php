<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use Sluggable;

    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'description', 'image', 'user_id'];

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }

//toFormattedDateString
    protected function createdAt(): Attribute
    {

        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('D M Y')

        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
