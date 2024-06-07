<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ContactResource::collection(
            Contact::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request): ContactResource
    {
        return new ContactResource(
            Contact::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): ContactResource
    {
        return new ContactResource(
            Contact::with('user')->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        Contact::where('id', $id)
            ->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        Contact::find($id)->delete();
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id): void
    {
        Contact::withTrashed()->where('id', $id)->restore();
    }
}
