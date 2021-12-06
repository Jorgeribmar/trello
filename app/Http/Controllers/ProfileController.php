<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profileVariableFront = Auth::id();

        //retourne la vue home
        return view('home', compact('profileVariableFront'));
    }

    public function show($id)
    {
        //récupération des éléments id, name, email et password directement assignés dans des variables
        $profileIdFront = Auth::id();
        $profileName = Auth::user()->name;
        $profileEmail = Auth::user()->email;
        $profilePassword = Auth::user()->password;

        //retourne la vue profile via la route profile.show/{{profileIdFront}} = id récupéré
        return view('trello.profile', compact('profileIdFront', 'profileName', 'profileEmail', 'profilePassword'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profileIdFront = Auth::id();
        $profileName = Auth::user()->name;
        $profileEmail = Auth::user()->email;
        $profilePassword = Auth::user()->password;
        return view('trello.editProfile', compact('profileIdFront', 'profileName', 'profileEmail', 'profilePassword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('profile.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Création de la variable profileIdFront et recupération de l'id dans le model User grâce à ::find
    public function destroy($id)
    {
        $profileIdFront = User::find($id);
        //Suppression des valeurs en BDD correspondant à l'id avec -> delete()
        $profileIdFront->delete();
        //redirection vers la route posts/index
        return redirect()->route('welcome');
    }
}
