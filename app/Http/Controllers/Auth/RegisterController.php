<?php

namespace App\Http\Controllers\Auth;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Candidate\Candidate;
use App\Models\Employer\Employer;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Models\Role\RoleUser;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules[] = null;

        if ($data['condition'] == 'employer') {
            $rules = [
                'website'         => ['required', 'string', 'max:255'],
                'phone'           => ['required', 'string'],
                'company_name'    => ['required', 'string', 'max:50'],
                'company_address' => ['required', 'string', 'max:200'],
            ];
        }

        if ($data['condition'] == 'candidate') {
            $rules = [
                'first_name' => ['required', 'string', 'max:20'],
                'last_name'  => ['required', 'string', 'max:50'],
                'mobile'     => ['required', 'string', 'max:255'],
            ];
        }

        return Validator::make($data, [
            'condition'       => ['required'],
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'company_address' => ['required', 'string', 'max:200'],
            'password'        => ['required', 'string', 'min:8', 'confirmed'],
            ...$rules,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        $candidateId = null;
        if ($data['condition'] == 'candidate') {
            $candidateId = Candidate::create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'mobile'     => $data['mobile'],
            ])->id;
        }

        $employerId = null;
        if ($data['condition'] == 'employer') {
            $employerId = Employer::create([
                'email'           => $data['email'],
                'website'         => $data['website'],
                'phone'           => $data['phone'],
                'company_name'    => $data['company_name'],
                'company_address' => $data['company_address'],
            ])->id;
        }

        $user = User::create([
            'name'         => $data['first_name'] . '' . $data['last_name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
            'candidate_id' => $candidateId,
            'employer_id'  => $employerId,
        ]);


        if ($candidateId) {
            $this->setPermissionUser(PermissionEnum::is_candidate, $user);
            $this->setRoleUser(RoleEnum::Candidate, $user);
        }

        if ($employerId) {
            $this->setPermissionUser(PermissionEnum::is_employer, $user);
            $this->setRoleUser(RoleEnum::Employer, $user);
        }

        return $user;
    }

    public function setPermissionUser($permissionCode, User $user): void
    {
        $permissionId = Permission::whereCode($permissionCode)->value('id');
        $user->permissions()->attach($permissionId);
    }

    public function setRoleUser($roleCode, User $user): void
    {
        $roleId = Role::whereCode($roleCode)->value('id');
        $user->roles()->attach($roleId);
    }


}
