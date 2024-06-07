<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EloquentContactRepository implements ContactRepositoryInterface
{
    public function paginated(): AnonymousResourceCollection
    {
        return ContactResource::collection(
            Contact::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    public function show($id): ContactResource
    {
        if (null == $contact = Contact::with('user')->findOrFail($id)) {
            throw new ModelNotFoundException('Contact not found');
        }

        return new ContactResource($contact);
    }

    public function store(): ContactResource
    {
        return new ContactResource(
            Contact::create(request()->only(
                'created_by',
                'status',
                'full_name',
                'identification',
                'phones',
                'emails',
                'website',
                'address',
            ))
        );
    }

    public function update($id): void
    {
        Contact::where('id', $id)
            ->update(request()->only(
                'created_by',
                'status',
                'full_name',
                'identification',
                'phones',
                'emails',
                'website',
                'address',
            ));
    }

    public function destroy($id): void
    {
        Contact::destroy($id);
    }

    public function restore($id): void
    {
        Contact::withTrashed()->where('id', $id)->restore();
    }
}
