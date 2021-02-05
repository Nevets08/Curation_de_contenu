<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tableau extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'tableaux';

    protected $fillable = ['nom', 'description', 'url_icone', 'prive'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
