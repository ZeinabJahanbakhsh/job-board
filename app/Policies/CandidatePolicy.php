<?php

namespace App\Policies;

use App\Models\Candidate\Candidate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use LaravelIdea\Helper\App\Models\Role\_IH_Role_QB;


class CandidatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return _IH_Role_QB
     */
    public function viewAny(User $user): _IH_Role_QB
    {
        return $user->roles()->candidateRole();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User      $user
     * @param Candidate $candidate
     * @return bool
     */
    public function view(User $user, Candidate $candidate): bool
    {
        return $user->candidate_id->isNotEmpty() && $user->roles()->candidateRole()->get()->isNotEmpty()
          /*  ? Response::allow()
            : Response::deny('You do not own this post.')*/;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $user->candidate_id->isNotEmpty() && $user->roles()->candidateRole()->get()->isNotEmpty()
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User                   $user
     * @param  \App\Models\Candidate $candidate
     * @return Response|bool
     */
    public function update(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User                   $user
     * @param  \App\Models\Candidate $candidate
     * @return Response|bool
     */
    public function delete(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User                   $user
     * @param  \App\Models\Candidate $candidate
     * @return Response|bool
     */
    public function restore(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User                   $user
     * @param  \App\Models\Candidate $candidate
     * @return Response|bool
     */
    public function forceDelete(User $user, Candidate $candidate)
    {
        //
    }
}
