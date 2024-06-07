<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Repositories\Interfaces\NoteRepositoryInterface;

class NotesController extends CRUDController
{
    public function __construct(
        NoteRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
        $this->formRequest = NoteRequest::class;
    }
}
