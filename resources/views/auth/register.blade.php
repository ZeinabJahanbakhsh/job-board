@extends('layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Register') }}</p>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- -------------------*** Role ***----------------------------- -->
            <style>
                .hide {
                    display: none;
                }

                .show {
                    display: block;
                }
            </style>
            <div class="input-group mb-3">
                <select name="condition" class="form-control" id="select-condition" required>
                    <strong>
                        <option>{{ __('Choose Your Role') }} </option>
                    </strong>
                    <option value="employer">Employer</option>
                    <option value="candidate">Candidate</option>
                </select>
            </div>
            <!-- -------------------*** Role ***----------------------------- -->

            <!-- ---------**** Employer ****------------- -->
            <!-- Website -->
            <div id="employer_field_1" class="input-group mb-3 hide ">
                <input type="url" name="website" class="form-control @error('website') is-invalid @enderror"
                       placeholder="{{ __('Website') }}" autocomplete="website">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-flag"></span>
                    </div>
                </div>
                @error('website')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Company Name -->
            <div id="employer_field_2" class="input-group mb-3 hide ">
                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror"
                       placeholder="{{ __('Company Name') }}" autocomplete="company_name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-home"></span>
                    </div>
                </div>
                @error('company_name')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Company Address -->
            <div id="employer_field_3" class="input-group mb-3 hide ">
                <input type="text" name="company_address" class="form-control @error('company_address') is-invalid @enderror"
                       placeholder="{{ __('Company Address') }}" autocomplete="company_address">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-map-marker"></span>
                    </div>
                </div>
                @error('company_address')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Phone -->
            <div id="employer_field_4" class="input-group mb-3 hide ">
                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                       placeholder="{{ __('Phone') }}" autocomplete="phone">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
                @error('phone')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <!-- ---------**** Employer ****------------- -->


            <!-- ---------**** Candidate ****------------- -->
            <!-- Mobile -->
            <div id="candidate_field_3" class="input-group mb-3 hide ">
                <input type="tel" name="mobile" class="form-control @error('mobile') is-invalid @enderror"
                       placeholder="{{ __('Mobile') }}" autocomplete="mobile">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-mobile"></span>
                    </div>
                </div>
                @error('mobile')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <!-- ---------**** Candidate ****------------- -->

            <!-- Email -->
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{ __('Email') }}" required autocomplete="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- First Name -->
            <div class="input-group mb-3 ">
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                       placeholder="{{ __('First Name') }}" autocomplete="first_name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('first_name')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="input-group mb-3 ">
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                       placeholder="{{ __('Last Name') }}" autocomplete="last_name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-plus"></span>
                    </div>
                </div>
                @error('last_name')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="{{ __('Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="row">
                <div class="col-12">
                    <button type="submit"
                            class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $("#select-condition").change(function () {
            if (this.value === 'candidate') {
                $('#candidate_field_3').removeClass("hide");
                $('#employer_field_1').addClass("hide");
                $('#employer_field_2').addClass("hide");
                $('#employer_field_3').addClass("hide");
                $('#employer_field_4').addClass("hide");
            } else if (this.value === 'employer') {
                $('#candidate_field_3').addClass("hide");
                $('#employer_field_1').removeClass("hide");
                $('#employer_field_2').removeClass("hide");
                $('#employer_field_3').removeClass("hide");
                $('#employer_field_4').removeClass("hide");

            } else {
                $('#candidate_field_3').removeClass("show").addClass("hide");
                $('#employer_field_1').removeClass("show").addClass("hide");
                $('#employer_field_2').removeClass("show").addClass("hide");
                $('#employer_field_3').removeClass("show").addClass("hide");
                $('#employer_field_4').removeClass("show").addClass("hide");
            }
        });
    </script>
@endsection
