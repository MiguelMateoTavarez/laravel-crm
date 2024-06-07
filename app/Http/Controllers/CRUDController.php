<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Repositories\Share\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class CRUDController extends Controller
{
    protected RepositoryInterface $repository;
    protected string $formRequest;
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->repository->paginated();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): JsonResource
    {
        app($this->formRequest);
        return $this->repository->store();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResource
    {
        return $this->repository->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id): void
    {
        $this->repository->update($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        $this->repository->destroy($id);
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id): void
    {
        $this->repository->restore($id);
    }
}
