<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinkQuery
{
    // Obtener los enlaces de la comunidad por canal
    public function getByChannel(Channel $channel)
    {
        return $channel->communityLinks()->where('approved', true)->withCount('users')->latest('updated_at')->paginate(10);
    }

    // Obtener todos los enlaces de la comunidad
    public function getAll()
    {
        return CommunityLink::where('approved', true)->withCount('users')->latest('updated_at')->paginate(10);
    }

    // Obtener los enlaces más populares
    public function getMostPopular()
    {
        return CommunityLink::where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->paginate(10);
    }

    public function getMostPopularByChannel(Channel $channel){
        return $channel->communityLinks()->where('approved', true)
        ->withCount('users')
        ->orderBy('users_count', 'desc')
        ->paginate(10);
    }

    public function searchByTerm($term)
    {
        return CommunityLink::where('approved', true)
            ->whereAny([
                ['title', 'like', '%' . $term . '%'],
                ['link', 'like', '%' . $term . '%']
            ])
            ->paginate(10);
    }
}



