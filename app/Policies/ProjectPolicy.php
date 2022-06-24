<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function view(): bool
    {
        return auth()->user()->hasPermissionTo('view projects');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create projects');
    }

    public function update(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('edit projects');
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('delete projects');
    }
}
