<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;

class EloquentScheduleRepository implements ScheduleRepositoryInterface
{
    public function paginated()
    {
        return ScheduleResource::collection(
            Schedule::with(['user', 'contact'])
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    public function show($id)
    {
        return new ScheduleResource(
            Schedule::with(['user', 'contact'])->findOrFail($id)
        );
    }

    public function store()
    {
        return new ScheduleResource(
            Schedule::create(request()->only(
                'contact_id',
                'created_by',
                'type',
                'description',
                'date',
                'expiration_date',
                'time',
                'address',
                'reminder'))
        );
    }

    public function update($id)
    {
        Schedule::where('id', $id)
            ->update(request()->only(
                'contact_id',
                'created_by',
                'type',
                'description',
                'date',
                'expiration_date',
                'time',
                'address',
                'reminder')
            );
    }

    public function destroy($id)
    {
        Schedule::destroy($id);
    }

    public function restore($id)
    {
        Schedule::withTrashed()->where('id', $id)->restore();
    }
}
