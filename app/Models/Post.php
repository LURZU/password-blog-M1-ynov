<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'slug',
        'name',
        'content',
        'category_id',
        'image',
        'imagePath'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function imageUrl(): string  {
        return Storage::url($this->imagePath);
    }
}
