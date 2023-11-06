<?php

namespace App\Policies;

use App\Models\Employer\Employer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use LaravelIdea\Helper\App\Models\Role\_IH_Role_QB;


class EmployerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): _IH_Role_QB
    {
        return $user->roles()->employerRole();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User     $user
     * @param Employer $employer
     * @return Response|bool
     */
    public function view(User $user, Employer $employer): Response|bool
    {
        return $user->employer_id->isNotEmpty() && $user->roles()->employerRole()->get()->isNotEmpty()
            ? Response::allow()
            : Response::deny('You do not own this post.');;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return $user->employer_id->isNotEmpty() && $user->roles()->employerRole()->get()->isNotEmpty()
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User                  $user
     * @param  \App\Models\Employer $employer
     * @return Response|bool
     */
    public function update(User $user, Employer $employer)
    {
        return $user->employer_id->isNotEmpty() && $user->roles()->employerRole()->get()->isNotEmpty();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User                  $user
     * @param  \App\Models\Employer $employer
     * @return Response|bool
     */
    public function delete(User $user, Employer $employer)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User                  $user
     * @param  \App\Models\Employer $employer
     * @return Response|bool
     */
    public function restore(User $user, Employer $employer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User                  $user
     * @param  \App\Models\Employer $employer
     * @return Response|bool
     */
    public function forceDelete(User $user, Employer $employer)
    {
        //
    }
}
