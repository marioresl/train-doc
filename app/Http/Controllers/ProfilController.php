<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prometa\Sleek\Facades\Sleek;

class ProfilController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user->load('personalData');

        return view('profil.index', compact('user'));
    }

    public function update(Request $request){
        try{
            $user = auth()->user();

            $user->personalData->firstname = $request->firstname;
            $user->personalData->lastname = $request->lastname;
            $user->personalData->birthday = $request->birthday;
            $user->personalData->phone = $request->phone;
            $user->personalData->address = $request->address;

            $user->personalData->save();

            Sleek::raise('Erfolgreich gespeichert!', 'success');
        }catch (\Exception $e){
            Sleek::raise('Speichern Fehlgeschlagen!', 'danger');
        }
        return redirect()->route('profil.index');
    }
}
