<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Repositories\Interfaces\DocumentRepositoryInterface;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Http\Request;

class SchedulesController extends CRUDController
{
    public function __construct(
        ScheduleRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
        $this->formRequest = ScheduleRequest::class;
    }
}
