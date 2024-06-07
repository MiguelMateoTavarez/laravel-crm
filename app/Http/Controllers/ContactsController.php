<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactsController extends CRUDController
{
    public function __construct(
        ContactRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
        $this->formRequest = ContactRequest::class;
    }
}
