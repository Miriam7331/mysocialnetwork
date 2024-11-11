<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $trusted
 *
 * @property CommunityLinkUser[] $communityLinkUsers
 * @property CommunityLink[] $communityLinks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Si hay conflicto con el paginado, lo mantengo del primer código
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'trusted', // Se agrega trusted, ya que es parte del primer código.
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación uno a muchos con CommunityLinkUser.
     * Esto proviene del primer código, pero es relevante para el modelo.
     */
    public function communityLinkUsers()
    {
        return $this->hasMany(\App\Models\CommunityLinkUser::class, 'id', 'user_id');
    }
    
    /**
     * Relación uno a muchos con CommunityLink.
     * Se mantiene la relación, pero ahora usando belongsToMany para la tabla intermedia.
     */
    public function communityLinks()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users');
    }

    /**
     * Método que devuelve los links creados por el usuario.
     * Esto es una relación uno a muchos con CommunityLink.
     */
    public function myLinks()
    {
        return $this->hasMany(CommunityLink::class);
    }

    /**
     * Verifica si el usuario es confiable.
     * Esto se toma del primer código.
     */
    public function isTrusted()
    {
        return $this->trusted;
    }

    /**
     * Método para obtener los votos del usuario.
     */
    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users');
    }

    /**
     * Verifica si el usuario ha votado por un CommunityLink específico.
     */
    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }
}
