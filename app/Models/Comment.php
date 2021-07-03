<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'text', 'article_id'];

    public function createdBy() {
        return $this->belongsTo(Article::class);
    }
}
