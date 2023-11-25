<?php

namespace App\Http\Controllers;

use App\Models\Don;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DonController extends Controller
{
    /**
     * Affiche la liste des dons
     */
    public function index()
    {

        $dons = Don::all();
        return view('don.index', compact('dons'));
    }


    /**
     * return le formulaire de creation d'un don
     */
    public function create()
    {

        return view('don.create');
    }


    /**
     * Enregistre un nouveau don dans la base de données
     */
    public function store(Request $request, $id)
    {
        if (Auth::check()) {
            $request->validate([
                'amount' => 'required',
                'personnage_id' => 'required',

            ]);

            $don = new don([
                'amount' => $request->get('amount'),
                'date' => Carbon::now(),
                'personnage_id' => Auth::id(),
                'project_id' => $id
            ]);
//var_dump($don['personnage_id']);exit;
            $don->save();

            // Mettez à jour le current amount du projet concerné
            $project = Project::find($don['project_id']);
            $project->currentAmount += $don['amount'];
            $project->save();
            return redirect('/')->with('success', 'don Ajouté avec succès');
        } else {
            return redirect()->back()->withErrors(['email' => 'You had to connect to do a donation'])->withInput();
        }
    }


    /**
     * Affiche les détails d'un don spécifique
     */

    public function show($id)
    {

        $don = Don::findOrFail($id);
        return view('don.show', compact('don'));
    }


    /**
     * Affiche les détails d'un don spécifique
     */

    public function showPr($id)
    {

        $don_pr = Project::findOrFail($id);
        return view('don.create', compact('don_pr'));
    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $don = Don::findOrFail($id);

        return view('don.edit', compact('don'));
    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'personnage_id' => 'required',
            'project_id' => 'required'
        ]);

        $don = Don::findOrFail($id);
        $don->amount = $request->get('amount');
        $don->date = $request->get('date');
        $don->personnage_id = $request->get('personnage_id');
        $don->project_id = $request->get('project_id');


        $don->update();

        return redirect('/')->with('success', 'don Modifié avec succès');
    }




    /**
     * Supprime le don dans la base de données
     */
    public function destroy($id)
    {

        $don = Don::findOrFail($id);
        $don->delete();

        return redirect('/')->with('success', 'don Modifié avec succès');
    }
}
