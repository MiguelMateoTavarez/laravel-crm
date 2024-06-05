<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactResource::collection(Contact::all()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return ContactResource::collection(
            Contact::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ContactResource::collection(
            Contact::find($id)->first()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id)->first();

        $contact->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::find($id)->delete();
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id)
    {
        Contact::withTrashed()->where('id', $id)->restore();
    }
}
