<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Candidate\Candidate;
use App\Models\User;
use App\Policies\CandidatePolicy;
use App\Policies\EmployerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Candidate\Candidate' => CandidatePolicy::class,
        'App\Models\Candidate\Employer'  => EmployerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('access-candidate-menu', function (User $user){
           return $user->roles()->candidateRole()->get()->isNotEmpty();
        });

        Gate::define('access-employer-menu', function (User $user){
           return $user->roles()->employerRole()->get()->isNotEmpty();
        });

        Gate::define('access-admin-menu', function (User $user){
            return $user->roles()->adminRole()->get()->isNotEmpty();
        });

    }
}
