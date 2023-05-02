<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['forum_id', 'content', 'created_at', 'updated_at', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function forum(){
        return $this->belongsTo(Forum::class);
    }
}
