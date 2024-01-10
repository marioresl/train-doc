<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalData;
use App\Models\User;
use Illuminate\Http\Request;
use Prometa\Sleek\Facades\Sleek;

class PersonalDataController extends Controller
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
    public function create(User $user)
    {
        return view('personalData.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        try{
            PersonalData::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone ?? null,
                'address' => $request->addresse ?? null,
                'birthday' => $request->birthday,
                'user_id' => $user->id
            ]);
            Sleek::raise('Persönliche Daten erfolgreich gespeichert!', 'success');
        }catch(\Exception $e){
            info($e);
            Sleek::raise('Fehlgeschlagen', 'danger');
        }
        return redirect()->route('home');

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
