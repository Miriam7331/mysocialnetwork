<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use App\Models\Channel;
use App\Http\Requests\CommunityLinkForm;
use Illuminate\Support\Facades\Auth;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{

    public function myLinks()
    {
        $links = CommunityLink::where('user_id', Auth::id())->paginate(10);
        return view('mylinks', compact('links'));
    }





    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        $query = new CommunityLinkQuery();
        $term = request()->get('query');


        if ($term) {
            // $links = $query->searchByTerm($term);
            $links = CommunityLink::where(function ($query) use ($term) {
                $query->where('title', 'like', '%' . $term . '%')
                    ->orWhere('link', 'like', '%' . $term . '%');
            })->paginate(10);
        } else {
            // Determina qué enlaces recuperar según el canal y el filtro de popularidad o recientes
            if ($channel) {
                if (request()->exists('popular')) {
                    $links = $query->getMostPopularByChannel($channel);
                } else {
                    $links = $query->getByChannel($channel);
                }
            } elseif (request()->exists('popular')) {
                $links = $query->getMostPopular();
            } else {
                $links = $query->getAll();
            }
        }

        // Obtiene todos los canales ordenados
        $channels = Channel::orderBy('title', 'asc')->get();

        return view('dashboard', compact('links', 'channels'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */

    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();

        $link = new CommunityLink($data);
        $link->user_id = Auth::id();

        // Verifica si el link ya ha sido enviado
        if ($link->hasAlreadyBeenSubmitted()) {
            return redirect('/dashboard')->with('message', 'El link fue actualizado o ya existe.');
        }

        // Si no existe, guarda el nuevo link
        $link->approved = Auth::user()->trusted ?? false;
        $link->save();

        if ($link->approved) {
            return redirect('/dashboard')->with('success', 'El link ha sido aprobado automáticamente.');
        } else {
            return redirect('/dashboard')->with('notice', 'Tu link está pendiente de aprobación.');
        }
    }

    // // public function store(CommunityLinkForm $request)
    // // {
    // //     $data = $request->validated();

    // //     $link = new CommunityLink($data);
    // //     $link->user_id = Auth::id();
    // //     $link->approved = Auth::user()->trusted ?? false;
    // //     $link->save();

    // //     if ($link->approved) {
    // //         return redirect('/dashboard')->with('success', 'El link ha sido aprobado automáticamente.');
    // //     } else {
    // //         return redirect('/dashboard')->with('notice', 'Tu link está pendiente de aprobación.');
    // //     }
    // // }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunityLinkForm  $request, CommunityLink $communityLink) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink) {}
}
