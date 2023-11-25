<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    /**
     * Affiche la liste des users
     */
    public function index()
    {

        $users = User::all();
        return view('user.index', compact('users'));
    }


    /**
     * eturn le formulair de login
     */
    public function login()
    {
        return view('user.login');
    }


    /**
     * return le formulaire de creation d'un personange
     */
    public function create()
    {

        return view('user.create');
    }


    /**
     * Enregistre un nouveau user dans la base de données
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $userv = User::where('email', $request->email)->first();
        if ($userv) {
            return redirect()->back()->withErrors(['email' => 'This email is already registered'])->withInput();
        }else {
            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ]);
    
    
            $user->save();
            return redirect('/')->with('success', 'user Ajouté avec succès');
        }

        
    }


    /**
     * Affiche les détails d'un user spécifique
     */

    public function show($id)
    {

        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');


        $user->update();

        return redirect('/')->with('success', 'user Modifié avec succès');
    }




    /**
     * Supprime le user dans la base de données
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'user Modifié avec succès');
    }


    /**
     * Supprime le user dans la base de données
     */

    public function loginTreat(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required',
            'password'=>'required',
        ]);

        
        //var_dump($request->email);exit;
        // Attempt to log in the user using Laravel's built-in Auth::attempt
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            return redirect('/')->with('success', 'User connected');
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

}
