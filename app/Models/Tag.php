<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function posts(){
        return $this->BelongsToMany(Post::class);
    }

}
