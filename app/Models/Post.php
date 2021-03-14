<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['url'];

    public function tableaux(){
        return $this->belongsToMany(Tableau::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function likes(){
        return $this->belongsToMany(User::class);
    }
}