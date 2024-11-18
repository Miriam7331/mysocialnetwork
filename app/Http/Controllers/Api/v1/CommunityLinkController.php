<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $query = new CommunityLinkQuery();
    $term = request()->get('query');

    if ($term) {
        $links = CommunityLink::where(function ($query) use ($term) {
            $query->where('title', 'like', '%' . $term . '%')
                ->orWhere('link', 'like', '%' . $term . '%');
        })->paginate(10);
    } elseif (request()->exists('popular')) {
        $links = $query->getMostPopular();
    } else {
        $links = $query->getAll();
    }

    return response()->json($links, 200);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $link = CommunityLink::find($id);
    
        if (!$link) {
            return response()->json(['error' => 'Link no encontrado'], 404);
        }
    
        return response()->json($link, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
