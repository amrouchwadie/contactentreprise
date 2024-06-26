<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Contact::with('organisation');

      
        if ($request->has('sort')) {
            $sortField = $request->input('sort');
    
            if ($sortField === 'statut') {
          
                $query->leftJoin('organisations', 'contacts.organisation_id', '=', 'organisations.id')
                      ->orderBy('organisations.statut');
            } else {
               
                $query->orderBy($sortField);
            }
        }
    
     
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
       
            // Validate the incoming request data
            $request->validate([
                'organisation_id' => 'required',
                'cle' => 'required',
                'e_mail' => 'required|email',
                'nom' => 'required',
                'prenom' => 'required',
                'telephone_fixe' => 'required',
                'service' => 'required',
                'fonction' => 'required',
            ]);
        
            // Check if confirmation is needed
            if ($request->has('confirm') && $request->confirm == 'yes') {
                // Save the new contact
                $contacts = new Contact($request->all());
                $contacts->save();
                return redirect('/')->with('success', 'Contact ajouté avec succès');
            }
        
            // Check if a contact with the same nom and prenom exists
            $existingContact = Contact::where('nom', $request->nom)
                                      ->where('prenom', $request->prenom)
                                      ->first();
        
            if ($existingContact) {
                // If exists, redirect back with a message to confirm the action
                return redirect()->back()->with([
                    'confirm' => 'Un contact existe déjà avec le même prénom et le même nom. 
                                  Êtes-vous sûr de vouloir ajouter ce contact ?',
                    'data' => $request->all()
                ]);
            }
        
            // If not exists, save the new contact directly
            return $this->storeContact($request);
    }

    private function storeContact($request)
    {
    $contacts = new Contact([
        'organisation_id' => $request->get('organisation_id'),
        'cle' => $request->cle,
        'e_mail' => $request->e_mail,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'telephone_fixe' => $request->telephone_fixe,
        'service' => $request->service,
        'fonction' => $request->fonction,
    ]);

    $contacts->save();

    return redirect('/')->with('success', 'Contact ajouté avec succès');
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
    public function edit($id)
    {
        $contact = Contact::with('organisation')->findOrFail($id);
        return view('edit_contact_modal', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

    $validatedData = $request->validate([
        'organisation_id' => 'required',
        'cle' => 'required',
        'e_mail' => 'required|email',
        'nom' => 'required',
        'prenom' => 'required',
        'telephone_fixe' => 'required',
        'service' => 'required',
        'fonction' => 'required',
    ]);

    $contact->update($validatedData);

    return redirect()->route('welcome')->with('success', 'Contact updated successfully.');
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
