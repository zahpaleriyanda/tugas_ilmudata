<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SesiAbsensi;
use Illuminate\Auth\Access\HandlesAuthorization;

class SesiAbsensiPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SesiAbsensi');
    }

    public function view(AuthUser $authUser, SesiAbsensi $sesiAbsensi): bool
    {
        return $authUser->can('View:SesiAbsensi');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SesiAbsensi');
    }

    public function update(AuthUser $authUser, SesiAbsensi $sesiAbsensi): bool
    {
        return $authUser->can('Update:SesiAbsensi');
    }

    public function delete(AuthUser $authUser, SesiAbsensi $sesiAbsensi): bool
    {
        return $authUser->can('Delete:SesiAbsensi');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SesiAbsensi');
    }

    public function restore(AuthUser $authUser, SesiAbsensi $sesiAbsensi): bool
    {
        return $authUser->can('Restore:SesiAbsensi');
    }

    public function forceDelete(AuthUser $authUser, SesiAbsensi $sesiAbsensi): bool
    {
        return $authUser->can('ForceDelete:SesiAbsensi');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SesiAbsensi');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SesiAbsensi');
    }

    public function replicate(AuthUser $authUser, SesiAbsensi $sesiAbsensi): bool
    {
        return $authUser->can('Replicate:SesiAbsensi');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SesiAbsensi');
    }

}