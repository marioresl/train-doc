<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Prometa\Sleek\Facades\Sleek;

class UserSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $session = UserSession::create([
            'user_id' => $user->id,
            'hours' => $request->hours,
            'date' => $request->date,
            'hours' => $request->hours,
            'type' => $request->type,
        ]);

        if($session){
            Sleek::raise('Erfolgreich gespeichert!', 'success');
        }else{
            Sleek::raise('Fehlgeschlagen!', 'danger');
        }

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
