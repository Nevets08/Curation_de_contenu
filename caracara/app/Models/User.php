<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Ce que j'ajoute moi : la relation avec les posts (et tableaux)
     *
     */
    public function posts(){ //Posts créés
        return $this->hasMany(Post::class);
    }

    //Relation plusieurs à plusieurs avec les tableaux, pour savoir si on est lecteur ou contributeur
    public function tableaux(){
        return $this->belongsToMany(Tableau::class);
    }

    //Relation un à plusieurs : les tableaux dont nous sommes le créateur
    public function tableauxCrees(){
        return $this->hasMany(Nom::class);
    }

    public function likes(){ //Posts likés
        return $this->belongsToMany(Post::class);
    }

    public function abonnements()
    {
        return $this->belongsToMany(Tableau::class, 'abonnements', 'user_id', 'tableau_id');
    }
}
