<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['imagable_type','imagable_id', 'size', 'path','name', 'extension'];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
