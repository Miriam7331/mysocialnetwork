<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommunityLinkUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'community_link_id'];

    public function toggle()
    {
        
        // $vote = $this->where('user_id', Auth::id())
        //     ->where('community_link_id', $this->community_link_id)
        //     ->first();

            $vote = $this->firstOrNew([
                'user_id' => Auth::id(),
                'community_link_id' => $this->community_link_id,
            ]);

        
        if ($vote) {
            $vote->delete();
        } else {
            $this->create(['user_id' => Auth::id(), 'community_link_id' => $this->community_link_id]);
        }
    }
}
