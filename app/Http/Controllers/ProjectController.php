<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Affiche la liste des projects
     */
    public function index()
    {

        $projects = Project::all();
        return view('project.index', compact('projects'));
    }


/**
     * Affiche la liste des projects
     */
    public function listAll()
    {

        $listprojects = Project::all();
        return view('project.listAll', compact('listprojects'));
    }



    /**
     * return le formulaire de creation d'un personange
     */
    public function create()
    {

        return view('project.create');
    }


    /**
     * Enregistre un nouveau project dans la base de données
     */
    public function store(Request $request)
    {
        //var_dump(Auth::check());exit;
        if (Auth::check()) {
            // Other operations...
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'objectif' => 'required',
                'personnage_id' => 'required',
                'benef' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]);


            $project = new Project([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'personnage_id' => $request->get('personnage_id'),
                'objectif' => $request->get('objectif'),
                'benef' => $request->get('benef'),
                'currentAmount' =>0,
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),
            ]);
//var_dump($request->get('personnage_id'));exit;
            $project->save();
            return redirect('/')->with('success', 'project Ajouté avec succès');
        }else {
            return redirect()->back()->withErrors(['email' => 'You had to connect to create a project'])->withInput();
        }
    }


    /**
     * Affiche les détails d'un project spécifique
     */

    public function show($id)
    {

        $project = Project::findOrFail($id);
        return view('project.show', compact('project'));
    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $project = Project::findOrFail($id);

        return view('project.edit', compact('project'));
    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'personnage_id' => 'required',
            'objectif' => 'required',
            'benef' => 'required',
            'currentAmount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $project = new Project([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'personnage_id' => $request->get('personnage_id'),
            'objectif' => $request->get('objectif'),
            'benef' => $request->get('email'),
            'currentAmount' => $request->get('currentAmount'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);


        $project->update();

        return redirect('/')->with('success', 'Project Modifié avec succès');
    }




    /**
     * Supprime le project dans la base de données
     */
    public function destroy($id)
    {

        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/')->with('success', 'Project Modifié avec succès');
    }
}
