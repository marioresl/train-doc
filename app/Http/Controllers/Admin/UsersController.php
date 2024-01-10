<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Prometa\Sleek\Facades\Sleek;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('sessions','personalData')->autoSort()->autoPaginate(20);

        return view('users.index',compact('users'));
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('personalData');
        $sessions = UserSession::where('user_id', $user->id)->with('course')->orderBy('created_at', 'desc')->get();
        return view('users.show', compact('user','sessions'));
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
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            Sleek::raise('Konto erfolgreich gesperrt!', 'success');
        }catch (\Exception $e){
            Sleek::raise('Konto erfolgreich gesperrt!');
        }
    }
}
