<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'posts';

    public $timestamps = true;

    // Método 2 do Controller@store
    // campos permitidos p/ serem preenchidos em massa
    protected $fillable = ['title', 'subtitle', 'description'];
    // campos não permitidos p/ serem preenchidos em massa
    protected $guarded = [];
}
