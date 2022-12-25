<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                @if(Session::has('type'))
                    @if(Session::get('type')=="Staff")
                        <?php $type = "Staff";?>
                        <h1>Staff
                    @endif
                    @if(Session::get('type')=="Coordinator")
                            <?php $type = "Coordinator";?>
                        <h1>Coordinator
                    @endif
                    @if(Session::get('type')=="Student")
                      <?php $type = "Student";?>
                        <h1>Student
                    @endif

                @endif
                 {{ config('app.name', 'Laravel') }} </h1>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @if(Session::has('loginID'))
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @if(Session::has('type'))
                        @if(Session::get('type')=="Student")
                        <li class="nav-item">
                            <a href="{{ route('student-detail') }}" class="nav-link">Your Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student-dashboard') }}">Project</a>
                        </li>
                        @endif
                        @if(Session::get('type')=="Staff")
                            <li class="nav-item">
                                <a href="{{ route('staff-detail') }}" class="nav-link">Your Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('staff-supervisor') }}">Supervisor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('staff-examiner') }}">Examiner</a>
                            </li>
                        @endif
                        @if(Session::get('type')=="Coordinator")
                            <li class="nav-item">
                                <a href="{{ route('staff-detail') }}" class="nav-link">Your Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('staff-coordinator') }}">Add Project</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login-student') }}" class="nav-link">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login-staff') }}">Staff</a>
                        </li>
                    @endif
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
