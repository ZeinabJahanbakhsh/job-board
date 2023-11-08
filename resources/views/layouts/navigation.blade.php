<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (Profile) -->
    @if(Auth::user())
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">
                {{ Auth::user()->name }}
                {{__('Profile ')}}
            </a>
        </div>
    </div>
    @endif

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <!--Dashboard-->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Your Dashboard') }}
                    </p>
                </a>
            </li>

            <!--List Advertisements-->
            <li class="nav-item">
                <a href="{{ route('list-advertisements') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('List Advertisements') }}
                    </p>
                </a>
            </li>

            <!--Candidate-->
            @can('access-candidate-menu')
                <li class="nav-item">
                     <a href="{{ route('all-resumes', Auth::user()->candidate_id) }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             {{ __('Submitted Resumes') }}
                         </p>
                     </a>
                 </li>
            @endcan

            <!--Employer-->
            <!--Add Advertisement-->
            @can('access-employer-menu')
                <li class="nav-item">
                    <a href="{{ route('create-advertisement', Auth::user()->employer_id) }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Add Advertisement') }}
                        </p>
                    </a>
                </li>

                <!--Your Advertisement-->
                <li class="nav-item">
                    <a href="{{route('all-advertisements', Auth::user()->employer_id)}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Your Advertisements') }}
                        </p>
                    </a>
                </li>

                <!--Received Resumes-->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Received Resumes') }}
                        </p>
                    </a>
                </li>
            @endcan

            <!--Users-->
           @can('access-admin-menu')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Users') }}
                        </p>
                    </a>
                </li>
            @endcan

            <!--About Us-->
            {{--<li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>--}}

            <!--Two Level Menu-->
            {{--<li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li>--}}

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
