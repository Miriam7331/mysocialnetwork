<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'channel_id',
        'title',
        'link',
    ];
    public function creator() //si en vez de creator uso user no es necesario usar user_id (que es la clave foránea)
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
