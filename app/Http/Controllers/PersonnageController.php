<?php


namespace App\Http\Controllers;


use App\Models\Personnage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class PersonnageController extends Controller
{

    /**
     * Affiche la liste des personnages
     */
    public function index()
    {

        $personnages = Personnage::all();
        return view('personnage.index', compact('personnages'));
    }


    /**
     * eturn le formulair de login
     */
    public function login()
    {
        return view('personnage.login');
    }


    /**
     * return le formulaire de creation d'un personange
     */
    public function create()
    {

        return view('personnage.create');
    }


    /**
     * Enregistre un nouveau personnage dans la base de données
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);


        $personnage = new Personnage([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email')
        ]);


        $personnage->save();
        return redirect('/')->with('success', 'Personnage Ajouté avec succès');
    }


    /**
     * Affiche les détails d'un personnage spécifique
     */

    public function show($id)
    {

        $personnage = Personnage::findOrFail($id);
        return view('personnage.show', compact('personnage'));
    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $personnage = Personnage::findOrFail($id);

        return view('personnage.edit', compact('personnage'));
    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {

        $request->validate([

            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required'

        ]);

        $personnage = Personnage::findOrFail($id);
        $personnage->name = $request->get('name');
        $personnage->surname = $request->get('surname');
        $personnage->phone = $request->get('phone');
        $personnage->email = $request->get('email');


        $personnage->update();

        return redirect('/')->with('success', 'Personnage Modifié avec succès');
    }




    /**
     * Supprime le personnage dans la base de données
     */
    public function destroy($id)
    {

        $personnage = Personnage::findOrFail($id);
        $personnage->delete();

        return redirect('/')->with('success', 'Personnage Modifié avec succès');
    }


    /**
     * Supprime le personnage dans la base de données
     */

    public function loginTreat(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required'
        ]);

        $user = Personnage::where('email', $request->email)->first();

        // Check if the user exists
        
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }else {
            Auth::attempt(['email' => $request->email]);
            return redirect('/login')->with('success', 'Success login');
        }

        //var_dump($request->email);exit;
        // Attempt to log in the user using Laravel's built-in Auth::attempt
        // if (Auth::attempt(['email' => $request->email])) {
        //     var_dump("test");
        //     exit;
        //     return redirect('/')->with('success', 'User connected');
        // }

        // Authentication failed
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
