<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Repositories\Interfaces\NoteRepositoryInterface;

class EloquentNoteRepository implements NoteRepositoryInterface
{
    public function paginated()
    {
        return NoteResource::collection(
            Note::with(['user', 'contact'])
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    public function show($id)
    {
        return new NoteResource(
            Note::with(['user', 'contact'])->findOrFail($id)
        );
    }

    public function store()
    {
        return new NoteResource(
            Note::create(request()->only(
                'contact_id',
                'created_by',
                'url'))
        );
    }

    public function update($id)
    {
        Note::where('id', $id)
            ->update(request()->only(
                'contact_id',
                'created_by',
                'url')
            );
    }

    public function destroy($id)
    {
        Note::destroy($id);
    }

    public function restore($id)
    {
        Note::withTrashed()->where('id', $id)->restore();
    }
}
