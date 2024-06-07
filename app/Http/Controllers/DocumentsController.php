<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Repositories\Interfaces\DocumentRepositoryInterface;

class DocumentsController extends CRUDController
{
    public function __construct(
        DocumentRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
        $this->formRequest = DocumentRequest::class;
    }
}
