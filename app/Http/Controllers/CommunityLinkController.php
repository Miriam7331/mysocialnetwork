<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use App\Models\Channel;
use App\Http\Requests\CommunityLinkForm;
use Illuminate\Support\Facades\Auth;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = CommunityLink::where('approved', 1)->paginate(25);
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('dashboard', compact('links', 'channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí podrías retornar una vista para crear un nuevo enlace.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();

        $link = new CommunityLink($data);
        $link->user_id = Auth::id();
        $link->approved = Auth::user()->trusted ?? false;
        $link->save();

        // Agregar mensaje flash usando with
        if ($link->approved) {
            return redirect('/dashboard')->with('success', 'El link ha sido aprobado automáticamente.');
        } else {
            return redirect('/dashboard')->with('notice', 'Tu link está pendiente de aprobación.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        // Aquí podrías retornar una vista para mostrar un enlace específico.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        // Aquí podrías retornar una vista para editar el enlace.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunityLinkForm  $request, CommunityLink $communityLink)
    {
        // Aquí iría la lógica para actualizar el enlace.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        // Aquí iría la lógica para eliminar el enlace.
    }
}
