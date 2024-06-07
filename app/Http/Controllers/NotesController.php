<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Contact;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return NoteResource::collection(
            Note::with(['user', 'contact'])
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request): NoteResource
    {
        return new NoteResource(
            Note::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): NoteResource
    {
        return new NoteResource(
            Note::with(['user', 'contact'])->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        Note::where('id', $id)
            ->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        Note::find($id)->delete();
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id): void
    {
        Note::withTrashed()->where('id', $id)->restore();
    }
}
