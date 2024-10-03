<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    use HasFactory;

    public function creator() //si en vez de creator uso user no es necesario usar user_id (que es la clave foránea)
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
