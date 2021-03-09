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
        return $this->belongsToMany(Post::class)->orderBy('created_at', 'desc');
    }

    //Les lecteurs/contributeurs
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('contributeur');
    }

    //Le créateur
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function abonnes()
    {
        return $this->belongsToMany(User::class, 'abonnements', 'tableau_id', 'user_id');
    }
}
