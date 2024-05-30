<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\organisation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Contact::with('organisation');

        // Handle sorting
        if ($request->has('sort')) {
            $sortField = $request->input('sort');
    
            if ($sortField === 'statut') {
                // Sort by the 'statut' field from the organisations table
                $query->leftJoin('organisations', 'contacts.organisation_id', '=', 'organisations.id')
                      ->orderBy('organisations.statut');
            } else {
                // For other fields, simply orderBy on the contacts table
                $query->orderBy($sortField);
            }
        }
    
        // Paginate the results
        $contacts = $query->paginate(10);
        
        return view('welcome', compact('contacts'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Contact::with('organisation')->get();
        return view('add_contact_modal', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contacts = new contact([
            'organisation_id' => $request->get('organisation_id')
        ]);

        $contacts->cle = $request->cle;
        $contacts->e_mail = $request->e_mail;
        $contacts->nom = $request->nom;
        $contacts->prenom = $request->prenom;
        $contacts->telephone_fixe = $request->telephone_fixe;
        $contacts->service = $request->service;
        $contacts->fonction = $request->fonction;
        $contacts->save();
        return redirect('/')->with('success', 'Contact Ajouter avec success');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contacts = Contact::with('organisation')->find($id);

        if (!$contacts) {
            return redirect()->route('welcome')->with('error', 'Contact pas trouvée');
        }

        return response()->json($contacts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacts = Contact::with('organisation')->find($id);

        if (!$contacts) {
            return redirect()->route('welcome')->with('error', 'Contact pas etre supprimer');
        }
        $contacts->delete();
        return redirect('/')->with('error', 'donnée a été supprimer');

    }

    public function rechercher(Request $request){
        $query = $request->input('query');

        $contacts = Contact::where('nom', 'LIKE', "%$query%")
            ->orWhere('prenom', 'LIKE', "%$query%")
            ->orWhereHas('organisation', function ($q) use ($query) {
                $q->where('nom', 'LIKE', "%$query%");
            })
            ->paginate(10);

        return view('welcome', compact('contacts'));

    }
}
