<?php

namespace App\Repositories\Share;

interface RepositoryInterface
{
    public function paginated();

    public function show($id);

    public function store();

    public function update($id);

    public function destroy($id);

    public function restore($id);
}
