<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\DocumentResource;
use App\Models\Document;
use App\Repositories\Interfaces\DocumentRepositoryInterface;

class EloquentDocumentRepository implements DocumentRepositoryInterface
{
    public function paginated()
    {
        return DocumentResource::collection(
            Document::with(['user', 'contact'])
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    public function show($id)
    {
        return new DocumentResource(
            Document::with(['user', 'contact'])->findOrFail($id)
        );
    }

    public function store()
    {
        return new DocumentResource(
            Document::create(request()->only(
                'contact_id',
                'created_by',
                'url'))
        );
    }

    public function update($id)
    {
        Document::where('id', $id)
            ->update(request()->only(
                'contact_id',
                'created_by',
                'url')
            );
    }

    public function destroy($id)
    {
        Document::destroy($id);
    }

    public function restore($id)
    {
        Document::withTrashed()->where('id', $id)->restore();
    }
}
