<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Jadwal;
use Illuminate\Auth\Access\HandlesAuthorization;

class JadwalPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Jadwal');
    }

    public function view(AuthUser $authUser, Jadwal $jadwal): bool
    {
        return $authUser->can('View:Jadwal');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Jadwal');
    }

    public function update(AuthUser $authUser, Jadwal $jadwal): bool
    {
        return $authUser->can('Update:Jadwal');
    }

    public function delete(AuthUser $authUser, Jadwal $jadwal): bool
    {
        return $authUser->can('Delete:Jadwal');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Jadwal');
    }

    public function restore(AuthUser $authUser, Jadwal $jadwal): bool
    {
        return $authUser->can('Restore:Jadwal');
    }

    public function forceDelete(AuthUser $authUser, Jadwal $jadwal): bool
    {
        return $authUser->can('ForceDelete:Jadwal');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Jadwal');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Jadwal');
    }

    public function replicate(AuthUser $authUser, Jadwal $jadwal): bool
    {
        return $authUser->can('Replicate:Jadwal');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Jadwal');
    }

}