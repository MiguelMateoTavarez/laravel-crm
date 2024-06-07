<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return DocumentResource::collection(
            Document::with(['user', 'contact'])
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request): DocumentResource
    {
        return new DocumentResource(
            Document::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): DocumentResource
    {
        return new DocumentResource(
            Document::with(['user', 'contact'])->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        Document::where('id', $id)
            ->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        Document::find($id)->delete();
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id): void
    {
        Document::withTrashed()->where('id', $id)->restore();
    }
}
